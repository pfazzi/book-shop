<?php

declare(strict_types=1);

namespace BookShop\Domain\Customer;

use RuntimeException;

final class SignUpFailed extends RuntimeException
{
    public function __construct(
        private string $reason,
        private array $context,
    ) {
    }

    public static function becauseEmailHasAlreadyBeenUsed(EmailAddress $emailAddress): self
    {
        return new self('email_has_already_been_used', ['email' => $emailAddress]);
    }
}
