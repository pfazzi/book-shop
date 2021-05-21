<?php

declare(strict_types=1);

namespace BookShop\Application\Command\BackOffice\Book;

use BookShop\Domain\Book\Book;
use BookShop\Domain\Book\BookRepository;
use BookShop\Domain\Book\Isbn;
use BookShop\Domain\Book\Title;
use Ramsey\Uuid\Uuid;

final class AddBookHandler
{
    public function __construct(private BookRepository $bookRepository)
    {
    }

    public function __invoke(AddBook $command): void
    {
        $newBook = new Book(
            Uuid::fromString($command->id),
            Isbn::fromString($command->isbn),
            Title::fromName($command->title),
            Uuid::fromString($command->authorId)
        );

        $this->bookRepository->store($newBook);
    }
}
