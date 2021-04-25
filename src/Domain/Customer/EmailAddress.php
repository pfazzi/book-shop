<?php

declare(strict_types=1);

namespace BookShop\Domain\Customer;

use JsonSerializable;
use Stringable;
use Webmozart\Assert\Assert;

/** @psalm-immutable */
final class EmailAddress implements JsonSerializable, Stringable
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

    public function jsonSerialize(): string
    {
        return (string) $this;
    }

    public function toString(): string
    {
        return (string) $this;
    }

    public function __toString(): string
    {
        return $this->address;
    }
}
