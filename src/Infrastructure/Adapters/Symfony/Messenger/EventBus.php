<?php

declare(strict_types=1);

namespace BookShop\Infrastructure\Adapters\Symfony\Messenger;

use Symfony\Component\Messenger\MessageBusInterface;

class EventBus implements \BookShop\Domain\Common\Event\EventBus
{
    public function __construct(
        private MessageBusInterface $eventBus
    ) {
    }

    public function dispatch(object ...$events): void
    {
        foreach ($events as $event) {
            $this->eventBus->dispatch($event);
        }
    }
}
