<?php

declare(strict_types=1);

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $container): void {
    $container->extension(
        namespace: 'framework',
        config: [
            'messenger' => [
                'default_bus' => 'command_bus',
                'buses' => [

                    // the 'allow_no_handlers' middleware allows to have no handler
                    // configured for this bus without throwing an exception
                    'event_bus' => ['default_middleware' => 'allow_no_handlers'],

                    'command_bus' => [
                        'middleware' => [
                            // each time a message is handled, the Doctrine connection
                            // is "pinged" and reconnected if it's closed. Useful
                            // if your workers run for a long time and the database
                            // connection is sometimes lost
                            'doctrine_ping_connection',

                            // After handling, the Doctrine connection is closed,
                            // which can free up database connections in a worker,
                            // instead of keeping them open forever
                            'doctrine_close_connection',

                            // wraps all handlers in a single Doctrine transaction
                            // handlers do not need to call flush() and an error
                            // in any handler will cause a rollback
                            'doctrine_transaction',
                        ],
                    ],
                ],
            ],
        ]
    );
};
