<?php
declare(strict_types=1);

namespace BookShop\Infrastructure\Doctrine\ViewModel;

use Doctrine\ORM\EntityManagerInterface;

class BookRepository implements \BookShop\Application\ViewModel\Book\BookRepository
{
    public function __construct(
        private EntityManagerInterface $entityManager
    ) {
    }

    public function listAll(): array
    {
        $query = $this->entityManager->createQuery(<<<DQL
SELECT NEW BookShop\Application\ViewModel\Book\Book(
    b.id,
    b.title,
    a.id,
    a.name
)
FROM BookShop\Domain\Book\Book b
    JOIN BookShop\Domain\Author\Author a
WHERE b.authorId = a.id
DQL);

        return $query->getResult();
    }
}