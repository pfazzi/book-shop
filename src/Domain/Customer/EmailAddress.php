<?php

declare(strict_types=1);

namespace BookShop\Domain\Customer;

use Webmozart\Assert\Assert;

/**
 * @psalm-immutable
 */
final class EmailAddress
{
    public function __construct(
        private string $address
    ) {
        Assert::email($this->address);
    }

    public static function fromString(string $address): self
    {
        return new self($address);
    }
}
