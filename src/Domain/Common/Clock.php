<?php

declare(strict_types=1);

namespace BookShop\Domain\Common;

interface Clock
{
    public function now(): Timestamp;
}
