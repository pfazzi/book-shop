<?php

declare(strict_types=1);

namespace BookShop\Domain\Common\Event;

interface Recorder
{
    public function releaseEvents(): array;

    public function clearEvents(): void;
}
