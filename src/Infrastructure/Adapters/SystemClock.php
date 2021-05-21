<?php

declare(strict_types=1);

namespace BookShop\Infrastructure\Adapters;

use BookShop\Domain\Common\Clock;
use BookShop\Domain\Common\Timestamp;
use DateTimeImmutable;

class SystemClock implements Clock
{
    public function now(): Timestamp
    {
        return new Timestamp(new DateTimeImmutable());
    }
}
