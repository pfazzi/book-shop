<?php

declare(strict_types=1);

namespace BookShop\Domain\Customer;

use BookShop\Domain\Common\Event\Event;
use BookShop\Domain\Common\Timestamp;
use Ramsey\Uuid\UuidInterface;

/** @psalm-immutable  */
class CustomerSignedUp extends Event
{
    public function __construct(
        public UuidInterface $customerId,
        public Timestamp $signedUpAt,
        public EmailAddress $email,
        public Name $name,
    ) {
    }
}
