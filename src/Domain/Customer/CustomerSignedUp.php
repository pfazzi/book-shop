<?php

declare(strict_types=1);

namespace BookShop\Domain\Customer;

use DateTimeImmutable;
use Ramsey\Uuid\UuidInterface;

/** @psalm-immutable  */
class CustomerSignedUp
{
    public function __construct(
        public UuidInterface $id,
        public EmailAddress $email,
        public Name $name,
        public DateTimeImmutable $signedUpAt
    ) {
    }
}
