<?php

declare(strict_types=1);

namespace BookShop\Domain\Common;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Embeddable */
class Money
{
    public function __construct(
        /** @ORM\Column(type="integer", nullable=true) */
        private int $amount,
        /** @ORM\Column(type="string", length=3, nullable=true) */
        private string $currency
    ) {
    }

    public function isEqual(self $other): bool
    {
        return $this->currency === $other->currency && $this->amount === $other->amount;
    }
}
