<?php

declare(strict_types=1);

namespace BookShop\Application\Command\BackOffice\Book;

/** @psalm-immutable */
class EditBook
{
    public function __construct(
        public string $id,
        public string $title,
        public int $authorId,
    ) {
    }
}
