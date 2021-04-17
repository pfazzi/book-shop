<?php

declare(strict_types=1);

namespace BookShop\Infrastructure\Symfony\Messenger;

use Symfony\Component\Messenger\MessageBusInterface;

class CommandBus implements \BookShop\Application\Command\CommandBus
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
