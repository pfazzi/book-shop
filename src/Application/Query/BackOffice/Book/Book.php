<?php

declare(strict_types=1);

namespace BookShop\Application\Query\BackOffice\Book;

/** @psalm-immutable */
class Book
{
    public function __construct(
        public string $id,
        public string $isbn,
        public string $title,
        public string $authorId,
    ) {
    }
}
