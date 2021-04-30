<?php

declare(strict_types=1);

namespace BookShop\Application\Query\BackOffice\Author;

interface AuthorRepository
{
    /**
     * @return Author[]
     */
    public function getAll(): array;

    public function get(string $id): Author;
}
