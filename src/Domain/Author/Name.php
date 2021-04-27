<?php

declare(strict_types=1);

namespace BookShop\Domain\Author;

use Stringable;

class Name implements Stringable
{
    public function __construct(
        private string $name
    ) {
    }

    public static function fromString(string $name): self
    {
        return new self($name);
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
