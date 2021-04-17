<?php
declare(strict_types=1);

namespace BookShop\Application\ViewModel\Book;

use BookShop\Application\ViewModel\Author\Author;
use JetBrains\PhpStorm\Pure;

class Book
{
    public Author $author;

    #[Pure] public function __construct(
        public int $id,
        public string $title,
        int $authorId,
        string $authorName
    ) {
        $this->author = new Author($authorId, $authorName);
    }
}