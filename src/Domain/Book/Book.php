<?php

declare(strict_types=1);

namespace BookShop\Domain\Book;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;

/** @ORM\Entity */
class Book
{
    /** @ORM\Id @ORM\Column(type="uuid") */
    private UuidInterface $id;

    /** @ORM\Column(type="isbn") */
    private Isbn $isbn;

    /** @ORM\Column(type="title") */
    private Title $title;

    /** @ORM\Column(type="uuid") */
    private UuidInterface $authorId;

    public function __construct(
        UuidInterface $id,
        Isbn $isbn,
        Title $title,
        UuidInterface $authorId
    ) {
        $this->id       = $id;
        $this->isbn     = $isbn;
        $this->title    = $title;
        $this->authorId = $authorId;
    }

    public function changeData(
        Isbn $isbn,
        Title $title,
        UuidInterface $authorId
    ): void {
        $this->isbn     = $isbn;
        $this->title    = $title;
        $this->authorId = $authorId;
    }
}
