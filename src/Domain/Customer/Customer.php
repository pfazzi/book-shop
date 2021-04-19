<?php

declare(strict_types=1);

namespace BookShop\Domain\Customer;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;

/** @ORM\Entity */
class Customer
{
    /** @ORM\Id @ORM\Column(type="uuid") */
    private UuidInterface $id;

    /** @ORM\Embedded(class="EmailAddress", columnPrefix=false) */
    private EmailAddress $email;

    private PlainPassword $plainPassword;

    /** @ORM\Embedded(class="Name", columnPrefix=false) */
    private Name $name;

    public function __construct(
        UuidInterface $id,
        EmailAddress $email,
        PlainPassword $plainPassword,
        Name $name
    ) {
        $this->id            = $id;
        $this->email         = $email;
        $this->plainPassword = $plainPassword;
        $this->name          = $name;
    }
}
