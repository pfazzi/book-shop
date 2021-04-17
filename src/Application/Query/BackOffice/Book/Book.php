<?php
declare(strict_types=1);

namespace BookShop\Application\Query\BackOffice\Book;

use BookShop\Application\Query\BackOffice\Author\Author;

/**
 * @psalm-immutable
 */
class Book
{
    public Author $author;

    public function __construct(
        public int $id,
        public string $title,
        int $authorId,
        string $authorName
    ) {
        $this->author = new Author($authorId, $authorName);
    }
}