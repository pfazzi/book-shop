<?php

declare(strict_types=1);

namespace BookShop\Domain\Common\Event;

interface EventBus
{
    public function dispatch(object ...$events): void;
}
