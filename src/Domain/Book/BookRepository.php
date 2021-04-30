<?php

declare(strict_types=1);

namespace BookShop\Domain\Book;

use Ramsey\Uuid\UuidInterface;

interface BookRepository
{
    /**
     * @throws BookNotFound
     */
    public function get(UuidInterface $id): Book;

    public function store(Book $book): void;
}
