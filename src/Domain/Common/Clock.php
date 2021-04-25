<?php

declare(strict_types=1);

namespace BookShop\Domain\Common;

use DateTimeImmutable;

interface Clock
{
    public function now(): DateTimeImmutable;
}
