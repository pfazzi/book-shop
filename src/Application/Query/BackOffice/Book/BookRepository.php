<?php

declare(strict_types=1);

namespace BookShop\Application\Query\BackOffice\Book;

interface BookRepository
{
    /**
     * @return Book[]
     */
    public function getAll(): array;

    public function get(string $id): Book;
}
