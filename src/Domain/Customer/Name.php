<?php

declare(strict_types=1);

namespace BookShop\Domain\Customer;

use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

/** @ORM\Embeddable() @psalm-immutable */
final class Name implements JsonSerializable
{
    public function __construct(
        /** @ORM\Column(type="string") */
        private string $firstName,
        /** @ORM\Column(type="string") */
        private string $lastName,
    ) {
    }

    public function jsonSerialize(): array
    {
        return [
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
        ];
    }
}
