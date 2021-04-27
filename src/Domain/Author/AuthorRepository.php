<?php

declare(strict_types=1);

namespace BookShop\Domain\Author;

use Ramsey\Uuid\UuidInterface;

interface AuthorRepository
{
    /**
     * @throws AuthorNotFound
     */
    public function get(UuidInterface $id): Author;

    public function store(Author $author): void;
}
