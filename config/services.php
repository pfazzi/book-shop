<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use BookShop\Application\Query;
use BookShop\Domain\Customer\CustomerCollection;
use BookShop\Domain\Customer\CustomerFactory;
use BookShop\Domain\Customer\CustomerRepository;
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
    )->tag('messenger.message_handler');

    $services->load(
        namespace: 'BookShop\Application\Query\\',
        resource: '../src/Application/Query/'
    )->exclude($classesToFileNames(
        Query\BackOffice\Author\Author::class,
        Query\BackOffice\Book\Book::class,
        Query\Shop\Book\Author::class,
        Query\Shop\Book\Book::class,
    ));

    $services->set(CustomerFactory::class);
    $services->set(CustomerRepository::class);
    $services->set(CustomerCollection::class);
};
