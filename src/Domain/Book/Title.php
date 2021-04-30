<?php

declare(strict_types=1);

namespace BookShop\Domain\Book;

use Stringable;

/** @psalm-immutable  */
class Title implements Stringable
{
    private string $title;

    public function __construct(
        string $title
    ) {
        $this->title = $title;
    }

    public static function fromName(string $title): self
    {
        return new self($title);
    }

    public function __toString(): string
    {
        return $this->title;
    }
}
