<?php

declare(strict_types=1);

namespace BookShop\Application\Command\BackOffice\Customer;

use BookShop\Domain\Common\Clock;
use BookShop\Domain\Common\Event\EventBus;
use BookShop\Domain\Customer\Customer;
use BookShop\Domain\Customer\CustomerRepository;
use BookShop\Domain\Customer\EmailAddress;
use BookShop\Domain\Customer\Name;
use BookShop\Domain\Customer\PlainPassword;
use BookShop\Domain\Customer\UniqueEmailAddressSpecification;
use Ramsey\Uuid\Uuid;

final class SignUpHandler
{
    public function __construct(
        private Clock $clock,
        private EventBus $eventBus,
        private CustomerRepository $customerRepository,
        private UniqueEmailAddressSpecification $uniqueEmailAddressSpecification,
    ) {
    }

    public function __invoke(SignUp $command): void
    {
        $newCustomer = Customer::signUp(
            $this->clock,
            $this->uniqueEmailAddressSpecification,
            Uuid::fromString($command->id),
            EmailAddress::fromString($command->email),
            PlainPassword::fromString($command->plainPassword),
            new Name($command->firstName, $command->lastName)
        );

        $this->customerRepository->store($newCustomer);

        $this->eventBus->dispatch(...$newCustomer->releaseEvents());
    }
}
