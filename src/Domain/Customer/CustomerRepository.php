<?php

declare(strict_types=1);

namespace BookShop\Domain\Customer;

interface CustomerRepository
{
    public function get(EmailAddress $emailAddress): Customer;

    public function store(Customer $customer): void;
}
