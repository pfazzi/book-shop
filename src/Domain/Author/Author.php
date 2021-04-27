<?php

declare(strict_types=1);

namespace BookShop\Domain\Author;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;

/** @ORM\Entity */
class Author
{
    /** @ORM\Id() @ORM\Column(type="uuid") */
    private UuidInterface $id;

    /** @ORM\Column(type="author_name") */
    private Name $name;

    public function __construct(UuidInterface $id, Name $name)
    {
        $this->id   = $id;
        $this->name = $name;
    }

    public function setName(Name $name): void
    {
        $this->name = $name;
    }
}
