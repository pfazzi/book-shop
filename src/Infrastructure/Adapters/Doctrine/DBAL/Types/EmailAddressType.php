<?php

declare(strict_types=1);

namespace BookShop\Infrastructure\Adapters\Doctrine\DBAL\Types;

use BookShop\Domain\Customer\EmailAddress;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Stringable;

class EmailAddressType extends StringableType
{
    protected function doConvertToPHPValue(string $value, AbstractPlatform $platform): Stringable
    {
        return EmailAddress::fromString($value);
    }
}
