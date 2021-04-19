<?php

declare(strict_types=1);

namespace BookShop\Domain\Author;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Embeddable */
class Name
{
    /** @ORM\Column(type="string") */
    private string $name;

    public function __construct(
        string $name
    ) {
        $this->name = $name;
    }
}
