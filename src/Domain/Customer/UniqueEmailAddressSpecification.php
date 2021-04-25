<?php

declare(strict_types=1);

namespace BookShop\Domain\Customer;

interface UniqueEmailAddressSpecification
{
    public function isSatisfiedBy(EmailAddress $emailAddress): bool;
}
