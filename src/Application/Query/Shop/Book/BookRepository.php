<?php

declare(strict_types=1);

namespace BookShop\Application\Query\Shop\Book;

interface BookRepository
{
    /**
     * @return Book[]
     */
    public function findAll(): array;
}
