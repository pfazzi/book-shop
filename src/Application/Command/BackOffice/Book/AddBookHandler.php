<?php

declare(strict_types=1);

namespace BookShop\Application\Command\BackOffice\Book;

use BookShop\Domain\Book\BookRepository;

final class AddBookHandler
{
    public function __construct(BookRepository $bookRepository)
    {
    }

    public function __invoke(AddBook $command): void
    {
    }
}
