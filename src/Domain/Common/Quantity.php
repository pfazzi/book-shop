<?php

declare(strict_types=1);

namespace BookShop\Domain\Common;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Embeddable */
class Quantity
{
    public function __construct(
        /** @ORM\Column(type="float", nullable=true)  */
        private float $qty
    ) {
    }
}
