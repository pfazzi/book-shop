<?php

declare(strict_types=1);

namespace BookShop\Infrastructure\Adapters\Doctrine\EventStore;

use BookShop\Domain\Common\Event\Event as DomainEvent;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;

class EventPersister
{
    public function __construct(
        private EntityManagerInterface $entityManager
    ) {
    }

    public function __invoke(DomainEvent $event): void
    {
        $event = Event::wrap($event, new DateTimeImmutable());

        $this->entityManager->persist($event);
        $this->entityManager->flush();
    }
}
