<?php

declare(strict_types=1);

namespace BookShop\Domain\Customer;

use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;
use Webmozart\Assert\Assert;

/** @ORM\Embeddable @psalm-immutable */
final class EmailAddress implements JsonSerializable
{
    public function __construct(
        /** @ORM\Column(type="string") */
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
        return $this->address;
    }
}
