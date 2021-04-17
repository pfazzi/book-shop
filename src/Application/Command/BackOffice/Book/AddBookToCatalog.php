<?php
declare(strict_types=1);

namespace BookShop\Application\Command\BackOffice\Book;

/**
 * @psalm-immutable
 */
class AddBookToCatalog
{
    public function __construct(
        public string $title,
        public int $authorId,
    ) {
    }
}