<?php

declare(strict_types=1);

namespace BookShop\Infrastructure\Adapters\Doctrine\QueryModel\BackOffice;

use BookShop\Application\Query\BackOffice\Book\Book;
use Doctrine\ORM\EntityManagerInterface;

class BookRepository implements \BookShop\Application\Query\BackOffice\Book\BookRepository
{
    public function __construct(
        private EntityManagerInterface $entityManager
    ) {
    }

    public function getAll(): array
    {
        $query = $this->entityManager->createQuery(<<<DQL
SELECT NEW BookShop\Application\Query\BackOffice\Book\Book(
    b.id,
    b.isbn,
    b.title,
    b.authorId
)
FROM BookShop\Domain\Book\Book b
DQL);

        return $query->getResult();
    }

    public function get(string $id): Book
    {
        $query = $this->entityManager->createQuery(<<<DQL
SELECT NEW BookShop\Application\Query\BackOffice\Book\Book(
    b.id,
    b.isbn,
    b.title,
    b.authorId
)
FROM BookShop\Domain\Book\Book b
WHERE b.id = :id
DQL);

        $query->setParameter('id', $id);

        return $query->getSingleResult();
    }
}
