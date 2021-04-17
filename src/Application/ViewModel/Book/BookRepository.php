<?php
declare(strict_types=1);

namespace BookShop\Application\ViewModel\Book;

interface BookRepository
{
    /**
     * @return Book[]
     */
    public function listAll(): array;
}