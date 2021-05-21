<?php

declare(strict_types=1);

namespace BookShop\Infrastructure\Adapters\Doctrine\DBAL\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;
use LogicException;
use Stringable;

use function is_string;

abstract class StringableType extends StringType
{
    public function convertToDatabaseValue($value, AbstractPlatform $platform): string
    {
        if (! $value instanceof Stringable) {
            throw new LogicException();
        }

        return (string) $value;
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): Stringable
    {
        if (! is_string($value)) {
            throw new LogicException();
        }

        return $this->doConvertToPHPValue($value, $platform);
    }

    abstract protected function doConvertToPHPValue(string $value, AbstractPlatform $platform): Stringable;
}
