<?php

declare(strict_types=1);

namespace BookShop\Infrastructure\Doctrine\QueryModel\BackOffice;

use Doctrine\ORM\EntityManagerInterface;

class BookRepository implements \BookShop\Application\Query\BackOffice\Book\BookRepository
{
    public function __construct(
        private EntityManagerInterface $entityManager
    ) {
    }

    public function findAll(): array
    {
        $query = $this->entityManager->createQuery(<<<DQL
SELECT NEW BookShop\Application\Query\BackOffice\Book\Book(
    b.id,
    b.title,
    b.authorId
)
FROM BookShop\Domain\Book\Book b
WHERE b.authorId = a.id
DQL);

        return $query->getResult();
    }
}
