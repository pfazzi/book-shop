<?php

declare(strict_types=1);

namespace BookShop\Infrastructure\Adapters\Doctrine\CommandModel;

use BookShop\Domain\Author\Author;
use BookShop\Domain\Author\AuthorNotFound;
use Doctrine\ORM\EntityManagerInterface;
use Ramsey\Uuid\UuidInterface;

class AuthorRepository implements \BookShop\Domain\Author\AuthorRepository
{
    public function __construct(
        private EntityManagerInterface $entityManager
    ) {
    }

    public function store(Author $author): void
    {
        $this->entityManager->persist($author);
    }

    public function get(UuidInterface $id): Author
    {
        return $this->entityManager->find(Author::class, $id) ?? throw new AuthorNotFound();
    }
}
