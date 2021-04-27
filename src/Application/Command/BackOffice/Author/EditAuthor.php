<?php

declare(strict_types=1);

namespace BookShop\Application\Command\BackOffice\Author;

/** @psalm-immutable */
class EditAuthor
{
    public function __construct(
        public string $id,
        public string $name,
    ) {
    }
}
