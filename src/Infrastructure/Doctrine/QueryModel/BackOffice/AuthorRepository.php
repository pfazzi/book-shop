<?php

declare(strict_types=1);

namespace BookShop\Infrastructure\Doctrine\QueryModel\BackOffice;

use Doctrine\ORM\EntityManagerInterface;

class AuthorRepository implements \BookShop\Application\Query\BackOffice\Author\AuthorRepository
{
    public function __construct(
        private EntityManagerInterface $entityManager
    ) {
    }

    public function findAll(): array
    {
        $query = $this->entityManager->createQuery(<<<DQL
SELECT NEW  BookShop\Application\Query\BackOffice\Author\Author(
    a.id,
    a.name
)
FROM BookShop\Domain\Author\Author a
DQL);

        return $query->getResult();
    }
}
