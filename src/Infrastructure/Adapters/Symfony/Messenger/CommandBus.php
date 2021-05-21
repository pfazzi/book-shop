<?php

declare(strict_types=1);

namespace BookShop\Infrastructure\Adapters\Symfony\Messenger;

use Symfony\Component\Messenger\MessageBusInterface;

class CommandBus implements \BookShop\Application\Command\CommandBus
{
    public function __construct(
        private MessageBusInterface $commandBus
    ) {
    }

    public function dispatch(object $command): void
    {
        $this->commandBus->dispatch($command);
    }
}
