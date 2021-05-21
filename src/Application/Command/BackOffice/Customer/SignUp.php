<?php

declare(strict_types=1);

namespace BookShop\Application\Command\BackOffice\Customer;

/** @todo move to store folder */
/** @psalm-immutable */
final class SignUp
{
    public function __construct(
        public string $id,
        public string $email,
        public string $plainPassword,
        public string $firstName,
        public string $lastName
    ) {
    }
}
