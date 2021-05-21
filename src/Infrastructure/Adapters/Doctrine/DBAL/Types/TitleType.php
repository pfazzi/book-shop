<?php

declare(strict_types=1);

namespace BookShop\Infrastructure\Adapters\Doctrine\DBAL\Types;

use BookShop\Domain\Book\Title;
use Doctrine\DBAL\Platforms\AbstractPlatform;

class TitleType extends StringableType
{
    protected function doConvertToPHPValue(string $value, AbstractPlatform $platform): Title
    {
        return Title::fromName($value);
    }
}
