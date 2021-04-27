<?php

declare(strict_types=1);

namespace BookShop\Application\Command\BackOffice\Author;

use BookShop\Domain\Author\Author;
use BookShop\Domain\Author\AuthorRepository;
use BookShop\Domain\Author\Name;
use Ramsey\Uuid\Uuid;

class AddAuthorHandler
{
    public function __construct(private AuthorRepository $authorRepository)
    {
    }

    public function __invoke(AddAuthor $command): void
    {
        $newAuthor = new Author(
            id: Uuid::fromString($command->id),
            name: Name::fromString($command->name),
        );

        $this->authorRepository->store($newAuthor);
    }
}
