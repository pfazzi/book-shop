<?php
declare(strict_types=1);

namespace BookShop\Application\ViewModel\Author;

class Author
{
    public function __construct(
        public int $id,
        public string $name
    ) {
    }
}