<?php

declare(strict_types=1);

use BookShop\Adapters\Doctrine\DBAL\Types\EmailAddressType;
use BookShop\Adapters\Doctrine\DBAL\Types\TimestampType;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $container): void {
    $container->extension(
        namespace: 'doctrine',
        config: [
            'dbal' => [
                'override_url' => true,
                'url' => '%env(resolve:DATABASE_URL)%',
                'types' => [
                    'timestamp' => TimestampType::class,
                    'email_address' => EmailAddressType::class,
                ],
            ],
            'orm' => [
                'auto_generate_proxy_classes' => true,
                'naming_strategy' => 'doctrine.orm.naming_strategy.underscore_number_aware',
                'auto_mapping' => true,
                'mappings' => [
                    'Domain' => [
                        'is_bundle' => false,
                        'type' => 'annotation',
                        'dir' => '%kernel.project_dir%/src/Domain',
                        'prefix' => 'BookShop\\Domain',
                        'alias' => 'Domain',
                    ],
                    'EventStore' => [
                        'is_bundle' => false,
                        'type' => 'annotation',
                        'dir' => '%kernel.project_dir%/src/Adapters/Doctrine/EventStore',
                        'prefix' => 'BookShop\\Adapters\\Doctrine\\EventStore',
                        'alias' => 'EventStore',
                    ],
                ],
            ],
        ],
    );
};
