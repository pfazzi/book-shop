<?php

declare(strict_types=1);

namespace BookShop\Domain\Common;

use DateTimeImmutable;
use JsonSerializable;
use Stringable;

use const DATE_ATOM;

class Timestamp implements JsonSerializable, Stringable
{
    public function __construct(
        private DateTimeImmutable $timestamp
    ) {
    }

    public function jsonSerialize(): string
    {
        return (string) $this;
    }

    public function toString(): string
    {
        return (string) $this;
    }

    public function __toString(): string
    {
        return $this->timestamp->format(DATE_ATOM);
    }

    public function toDateTimeImmutable(): DateTimeImmutable
    {
        return $this->timestamp;
    }
}
