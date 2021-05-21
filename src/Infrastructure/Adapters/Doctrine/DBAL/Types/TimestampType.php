<?php

declare(strict_types=1);

namespace BookShop\Infrastructure\Adapters\Doctrine\DBAL\Types;

use BookShop\Domain\Common\Timestamp;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\DateTimeImmutableType;
use LogicException;

class TimestampType extends DateTimeImmutableType
{
    public function convertToDatabaseValue($value, AbstractPlatform $platform): mixed
    {
        if (! $value instanceof Timestamp) {
            throw new LogicException();
        }

        return parent::convertToDatabaseValue($value->toDateTimeImmutable(), $platform);
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): Timestamp
    {
        $value = parent::convertToPHPValue($value, $platform);

        return new Timestamp($value);
    }
}
