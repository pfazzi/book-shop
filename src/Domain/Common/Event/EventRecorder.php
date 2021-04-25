<?php

declare(strict_types=1);

namespace BookShop\Domain\Common\Event;

interface EventRecorder
{
    /**
     * @return object[]
     */
    public function releaseEvents(): array;

    public function clearEvents(): void;
}
