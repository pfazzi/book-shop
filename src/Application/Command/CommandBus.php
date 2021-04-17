<?php

declare(strict_types=1);

namespace BookShop\Application\Command;

interface CommandBus
{
    public function dispatch(object $command): void;
}
