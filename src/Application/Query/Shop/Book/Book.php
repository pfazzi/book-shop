<?php

declare(strict_types=1);

namespace BookShop\Application\Query\Shop\Book;

/** @psalm-immutable */
class Book
{
    public Author $author;

    public function __construct(
        public string $id,
        public string $title,
        string $authorId,
        string $authorName
    ) {
        $this->author = new Author($authorId, $authorName);
    }
}
