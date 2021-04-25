<?php

declare(strict_types=1);

namespace BookShop\Domain\Common\Event;

trait EventRecordingCapabilities
{
    /** @var array<array-key, Event> */
    private array $events = [];

    private function recordThat(Event $event): void
    {
        $this->events[] = $event;
    }

    /**
     * @return Event[]
     */
    public function releaseEvents(): array
    {
        return $this->events;
    }

    public function clearEvents(): void
    {
        $this->events = [];
    }
}
