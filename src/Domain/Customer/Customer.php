<?php

declare(strict_types=1);

namespace BookShop\Domain\Customer;

use BookShop\Domain\Common\Clock;
use BookShop\Domain\Common\Event\EventRecorder;
use BookShop\Domain\Common\Event\EventRecordingCapabilities;
use BookShop\Domain\Common\Timestamp;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;

/** @ORM\Entity */
class Customer implements EventRecorder
{
    use EventRecordingCapabilities;

    /** @ORM\Id @ORM\Column(type="uuid") */
    private UuidInterface $id;

    /** @ORM\Column(type="email_address")) */
    private EmailAddress $emailAddress;

    /** @ORM\Embedded(class="Name", columnPrefix=false) */
    private Name $name;

    /** @ORM\Column(type="timestamp")  */
    private Timestamp $signedUpAt;

    private function __construct(
        UuidInterface $id,
        EmailAddress $emailAddress,
        PlainPassword $plainPassword,
        Name $name,
        Timestamp $signedUpAt,
    ) {
        $this->id           = $id;
        $this->emailAddress = $emailAddress;
        $this->name         = $name;
        $this->signedUpAt   = $signedUpAt;

        $this->recordThat(new CustomerSignedUp($id, $signedUpAt, $emailAddress, $name));
    }

    public static function signUp(
        Clock $clock,
        UniqueEmailAddressSpecification $uniqueEmailAddressSpecification,
        UuidInterface $id,
        EmailAddress $emailAddress,
        PlainPassword $plainPassword,
        Name $name
    ): self {
        if (! $uniqueEmailAddressSpecification->isSatisfiedBy($emailAddress)) {
            throw SignUpFailed::becauseEmailHasAlreadyBeenUsed($emailAddress);
        }

        return new self($id, $emailAddress, $plainPassword, $name, $clock->now());
    }
}
