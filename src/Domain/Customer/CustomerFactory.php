<?php

declare(strict_types=1);

namespace BookShop\Domain\Customer;

use Ramsey\Uuid\UuidInterface;

class CustomerFactory
{
    public function __construct(
        private CustomerCollection $customerCollection,
    ) {
    }

    public function create(
        UuidInterface $id,
        EmailAddress $emailAddress,
        PlainPassword $plainPassword,
        Name $name
    ): Customer {
        if ($this->customerCollection->containsUserWithEmail($emailAddress)) {
            throw SignUpFailed::becauseEmailHasAlreadyBeenUsed($emailAddress);
        }

        return new Customer(
            $id,
            $emailAddress,
            $plainPassword,
            $name
        );
    }
}
