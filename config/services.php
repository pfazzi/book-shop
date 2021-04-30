<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use BookShop\Adapters\Doctrine\EventStore\EventPersister;
use BookShop\Adapters\SystemClock;
use BookShop\Application\Command\CommandBus;
use BookShop\Application\Query\BackOffice\Author\Author;
use BookShop\Application\Query\BackOffice\Book\Book;
use BookShop\Domain\Author\AuthorRepository;
use BookShop\Domain\Book\BookRepository;
use BookShop\Domain\Common\Clock;
use BookShop\Domain\Common\Event\EventBus;
use BookShop\Domain\Customer\CustomerRepository;
use BookShop\Domain\Customer\UniqueEmailAddressSpecification;
use BookShop\Kernel;
use ReflectionClass;

use function array_map;

$classToFileName    = static fn (string $fqcn): string => (new ReflectionClass($fqcn))->getFileName();
$classesToFileNames = static fn (string ...$fqcns): array => array_map($classToFileName, $fqcns);

return static function (ContainerConfigurator $configurator) use ($classToFileName, $classesToFileNames): void {
    $services = $configurator->services()
        ->defaults()
            ->autowire()
            ->autoconfigure();

    $services->load(namespace: 'BookShop\\', resource: '../src/*')
        ->exclude([
            '../src/Application/Command/',
            '../src/Application/Query/',
            '../src/Domain/',
            $classToFileName(Kernel::class),
        ]);

    $services->load(
        namespace: 'BookShop\Ports\ShopApi\Controller\\',
        resource: '../src/Ports/ShopApi/Controller/'
    )->tag('controller.service_arguments');

    $services->load(
        namespace: 'BookShop\Ports\BackOfficeApi\Controller\\',
        resource: '../src/Ports/BackOfficeApi/Controller/'
    )->tag('controller.service_arguments');

    $services->load(
        namespace: 'BookShop\Application\Command\\',
        resource: '../src/Application/Command/**/**Handler.php'
    )->tag('messenger.message_handler', ['bus' => 'command_bus']);

    $services->load(
        namespace: 'BookShop\Application\Query\\',
        resource: '../src/Application/Query/'
    )->exclude($classesToFileNames(
        Author::class,
        Book::class,
        \BookShop\Application\Query\Shop\Book\Author::class,
        \BookShop\Application\Query\Shop\Book\Book::class,
    ));

    $services->alias(
        id: CommandBus::class,
        referencedId: \BookShop\Adapters\Symfony\Messenger\CommandBus::class
    );

    $services->alias(
        id: EventBus::class,
        referencedId: \BookShop\Adapters\Symfony\Messenger\EventBus::class
    );

    $services->alias(
        id: CustomerRepository::class,
        referencedId: \BookShop\Adapters\Doctrine\CommandModel\CustomerRepository::class
    );

    $services->alias(
        id: AuthorRepository::class,
        referencedId: \BookShop\Adapters\Doctrine\CommandModel\AuthorRepository::class
    );

    $services->alias(
        id: BookRepository::class,
        referencedId: \BookShop\Adapters\Doctrine\CommandModel\BookRepository::class
    );

    $services->alias(
        id: UniqueEmailAddressSpecification::class,
        referencedId: \BookShop\Adapters\Doctrine\CommandModel\CustomerRepository::class
    );

    $services->alias(
        id: Clock::class,
        referencedId: SystemClock::class
    );

    $services->set(EventPersister::class)
        ->tag('messenger.message_handler', ['bus' => 'event_bus']);
};
