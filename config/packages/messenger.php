<?php

declare(strict_types=1);

use BookShop\Domain\Common\Event\Event as DomainEvent;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $container): void {
    $container->extension(
        namespace: 'framework',
        config: [
            'messenger' => [
                'default_bus' => 'command_bus',
                'transports' => [
                    'commands' => 'sync://',
                    'events' => '%env(ASYNC_MESSENGER_TRANSPORT_DSN)%',
                ],
                'routing' => [DomainEvent::class => 'events'],
                'buses' => [
                    'event_bus' => ['default_middleware' => 'allow_no_handlers'],
                    'command_bus' => [
                        'middleware' => [
                            'doctrine_ping_connection',
                            'doctrine_close_connection',
                            'doctrine_transaction',
                        ],
                    ],
                ],
            ],
        ]
    );
};
