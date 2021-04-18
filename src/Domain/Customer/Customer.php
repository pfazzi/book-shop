<?php

declare(strict_types=1);

namespace BookShop\Domain\Customer;

use Ramsey\Uuid\UuidInterface;

class Customer
{
    public function __construct(
        UuidInterface $id,
        EmailAddress $email,
        PlainPassword $plainPassword,
        Name $name
    ) {
    }
}
