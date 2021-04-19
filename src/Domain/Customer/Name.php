<?php

declare(strict_types=1);

namespace BookShop\Domain\Customer;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Embeddable() @psalm-immutable */
final class Name
{
    public function __construct(
        /** @ORM\Column(type="string") */
        private string $firstName,
        /** @ORM\Column(type="string") */
        private string $lastName,
    ) {
    }
}
