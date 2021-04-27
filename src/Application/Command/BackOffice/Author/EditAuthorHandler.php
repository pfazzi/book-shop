<?php

declare(strict_types=1);

namespace BookShop\Application\Command\BackOffice\Author;

use BookShop\Domain\Author\AuthorRepository;
use BookShop\Domain\Author\Name;
use Ramsey\Uuid\Uuid;

class EditAuthorHandler
{
    public function __construct(private AuthorRepository $authorRepository)
    {
    }

    public function __invoke(EditAuthor $command): void
    {
        $author = $this->authorRepository->get(Uuid::fromString($command->id));

        $author->setName(Name::fromString($command->name));

        $this->authorRepository->store($author);
    }
}
