<?php

declare(strict_types=1);

namespace BookShop\Infrastructure\Symfony\CommandBus;

use BookShop\Application\Command\CommandBus;
use Symfony\Component\Messenger\MessageBusInterface;

class MessengerCommandBus implements CommandBus
{
    public function __construct(
        private MessageBusInterface $messageBus
    ) {
    }

    public function dispatch(object $command): void
    {
        $this->messageBus->dispatch($command);
    }
}
