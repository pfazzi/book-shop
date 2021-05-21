<?php

declare(strict_types=1);

namespace BookShop\Infrastructure\Adapters\Doctrine\CommandModel;

use BookShop\Domain\Book\Book;
use BookShop\Domain\Book\BookNotFound;
use Doctrine\ORM\EntityManagerInterface;
use Ramsey\Uuid\UuidInterface;

class BookRepository implements \BookShop\Domain\Book\BookRepository
{
    public function __construct(
        private EntityManagerInterface $entityManager
    ) {
    }

    public function get(UuidInterface $id): Book
    {
        return $this->entityManager->find(Book::class, $id) ?? throw new BookNotFound();
    }

    public function store(Book $book): void
    {
        $this->entityManager->persist($book);
    }
}
