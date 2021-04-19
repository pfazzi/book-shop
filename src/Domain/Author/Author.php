<?php

declare(strict_types=1);

namespace BookShop\Domain\Author;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\Entity()
 */
class Author
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="uuid")
     */
    private UuidInterface $id;

    /** @ORM\Embedded(class="Name", columnPrefix=false) */
    private Name $name;

    public function __construct(UuidInterface $id, Name $name)
    {
        $this->id   = $id;
        $this->name = $name;
    }
}
