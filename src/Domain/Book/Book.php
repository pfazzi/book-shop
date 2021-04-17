<?php

declare(strict_types=1);

namespace BookShop\Domain\Book;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Book
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private int $id;

    /** @ORM\Column(type="string") */
    private string $title;

    /** @ORM\Column(type="integer") */
    private int $authorId;

    public function __construct(int $id, string $title, int $authorId)
    {
        $this->id       = $id;
        $this->title    = $title;
        $this->authorId = $authorId;
    }
}
