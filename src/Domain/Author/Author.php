<?php
declare(strict_types=1);

namespace BookShop\Domain\Author;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Author
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private int $id;

    /**
     * @ORM\Column(type="string")
     */
    private string $name;

    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
}