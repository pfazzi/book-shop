<?php

declare(strict_types=1);

namespace BookShop\Infrastructure\Adapters\Doctrine\QueryModel\BackOffice;

use BookShop\Application\Query\BackOffice\Author\Author;
use Doctrine\ORM\EntityManagerInterface;

class AuthorRepository implements \BookShop\Application\Query\BackOffice\Author\AuthorRepository
{
    public function __construct(
        private EntityManagerInterface $entityManager
    ) {
    }

    public function getAll(): array
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

    public function get(string $id): Author
    {
        $query = $this->entityManager->createQuery(<<<DQL
SELECT NEW  BookShop\Application\Query\BackOffice\Author\Author(
    a.id,
    a.name
)
FROM BookShop\Domain\Author\Author a
WHERE a.id = :id
DQL);

        $query->setParameter('id', $id);

        return $query->getSingleResult();
    }
}
