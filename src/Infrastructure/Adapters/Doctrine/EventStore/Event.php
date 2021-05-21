<?php

declare(strict_types=1);

namespace BookShop\Infrastructure\Adapters\Doctrine\EventStore;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(readOnly=true) @ORM\Table(name="event_store")
 *
 * @psalm-immutable
 */
class Event
{
    /**
     * @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue()
     *
     * @psalm-suppress PropertyNotSetInConstructor
     */
    private int $id;

    private function __construct(
        /** @ORM\Column(type="string") */
        public string $name,
        /** @ORM\Column(type="datetime_immutable") */
        public DateTimeImmutable $timestamp,
        /** @ORM\Column(type="json") */
        public object $payload,
    ) {
    }

    public static function wrap(
        object $event,
        DateTimeImmutable $timestamp,
    ): self {
        return new self(
            $event::class,
            $timestamp,
            $event,
        );
    }
}
