<?php

declare(strict_types=1);

namespace BookShop\Application\Command\BackOffice\Book;

/** @psalm-immutable */
final class EditBook
{
    public function __construct(
        public string $id,
        public string $isbn,
        public string $title,
        public string $authorId,
    ) {
    }
}
