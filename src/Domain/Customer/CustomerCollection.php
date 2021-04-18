<?php

declare(strict_types=1);

namespace BookShop\Domain\Customer;

interface CustomerCollection
{
    public function containsUserWithEmail(EmailAddress $emailAddress): bool;
}
