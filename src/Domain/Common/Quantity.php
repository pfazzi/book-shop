<?php

declare(strict_types=1);

namespace BookShop\Domain\Common;

use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

/** @ORM\Embeddable */
class Quantity implements JsonSerializable
{
    public function __construct(
        /** @ORM\Column(type="float", nullable=true)  */
        private float $qty
    ) {
    }

    public function jsonSerialize(): float
    {
        return $this->qty;
    }
}
