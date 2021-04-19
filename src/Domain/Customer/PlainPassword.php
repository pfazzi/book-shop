<?php

declare(strict_types=1);

namespace BookShop\Domain\Customer;

/** @psalm-immutable */
final class PlainPassword
{
    public function __construct(
        private string $password
    ) {
    }

    public static function fromString(string $password): self
    {
        return new self($password);
    }
}
