<?php

declare(strict_types=1);

namespace BookShop\Domain\Book;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Embeddable @psalm-immutable */
class Isbn
{
    public function __construct(
        /** @ORM\Column(type="string") */
        public string $code
    ) {
    }

    public static function fromString(string $code): self
    {
        return new self($code);
    }
}
