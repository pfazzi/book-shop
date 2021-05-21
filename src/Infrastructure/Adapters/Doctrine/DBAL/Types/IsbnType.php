<?php

declare(strict_types=1);

namespace BookShop\Infrastructure\Adapters\Doctrine\DBAL\Types;

use BookShop\Domain\Book\Isbn;
use Doctrine\DBAL\Platforms\AbstractPlatform;

class IsbnType extends StringableType
{
    protected function doConvertToPHPValue(string $value, AbstractPlatform $platform): Isbn
    {
        return Isbn::fromString($value);
    }
}
