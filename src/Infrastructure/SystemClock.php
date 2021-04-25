<?php

declare(strict_types=1);

namespace BookShop\Infrastructure;

use BookShop\Domain\Common\Clock;
use DateTimeImmutable;

class SystemClock implements Clock
{
    public function now(): DateTimeImmutable
    {
        return new DateTimeImmutable();
    }
}
