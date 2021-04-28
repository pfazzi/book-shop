<?php

declare(strict_types=1);

namespace BookShop\Application\Query\BackOffice\Book;

/** @psalm-immutable */
class Book
{
    public function __construct(
        public int $id,
        public string $title,
        public int $authorId,
    ) {
    }
}
