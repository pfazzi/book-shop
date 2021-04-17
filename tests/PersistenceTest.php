<?php

declare(strict_types=1);

namespace BookShop\Tests;

use BookShop\Domain\Author\Author;
use BookShop\Domain\Book\Book;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

use function assert;
use function json_encode;

use const JSON_PRETTY_PRINT;

class PersistenceTest extends KernelTestCase
{
    public function test_stuff(): void
    {
        self::bootKernel();
        $em = self::$container->get(EntityManagerInterface::class);
        assert($em instanceof EntityManagerInterface);

        $patrick = new Author(1, 'Patrick Luca Fazzi');
        $john    = new Author(2, 'John Doe');

        $cleanCode         = new Book(1, 'Clean Code', 2);
        $cleanArchitecture = new Book(2, 'Clean Architecture', 1);

        $em->persist($patrick);
        $em->persist($john);
        $em->persist($cleanCode);
        $em->persist($cleanArchitecture);
        $em->flush();

        $book = $em->find(Book::class, 1);

        self::assertEquals($book, $cleanCode);

        $query = $em->createQuery(<<<DQL
SELECT NEW BookShop\Application\ViewModel\Book(
    b.id,
    b.title,
    a.id,
    a.name
)
FROM BookShop\Domain\Book\Book b
    JOIN BookShop\Domain\Author\Author a
WHERE b.authorId = a.id
DQL);

        $result = $query->getResult();
        echo json_encode($result, JSON_PRETTY_PRINT);
    }
}
