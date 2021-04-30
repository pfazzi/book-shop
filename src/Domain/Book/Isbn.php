<?php

declare(strict_types=1);

namespace BookShop\Domain\Book;

use Stringable;

/** @psalm-immutable */
class Isbn implements Stringable
{
    public function __construct(
        public string $code
    ) {
    }

    public static function fromString(string $code): self
    {
        return new self($code);
    }

    public function __toString(): string
    {
        return $this->code;
    }
}
