<?php

declare(strict_types=1);

namespace BookShop\Domain\Common\Event;

trait EventRecordingCapabilities
{
    /** @var array<object> */
    private array $events = [];

    private function recordThat(object $event): void
    {
        $this->events[] = $event;
    }

    public function releaseEvents(): array
    {
        return $this->events;
    }

    public function clearEvents(): void
    {
        $this->events = [];
    }
}
