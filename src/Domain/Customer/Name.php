<?php

declare(strict_types=1);

namespace BookShop\Domain\Customer;

/**
 * @psalm-immutable
 */
final class Name
{
    public function __construct(
        private string $firstName,
        private string $lastName,
    ) {
    }
}
