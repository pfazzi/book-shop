<?php

declare(strict_types=1);

namespace BookShop\Application\Command\BackOffice\Customer;

use BookShop\Domain\Customer\CustomerFactory;
use BookShop\Domain\Customer\CustomerRepository;
use BookShop\Domain\Customer\EmailAddress;
use BookShop\Domain\Customer\Name;
use BookShop\Domain\Customer\PlainPassword;
use Ramsey\Uuid\Uuid;

final class SignUpHandler
{
    public function __construct(
        private CustomerFactory $customerFactory,
        private CustomerRepository $customerRepository,
    ) {
    }

    public function __invoke(SignUp $command): void
    {
        $newCustomer = $this->customerFactory->create(
            Uuid::fromString($command->id),
            EmailAddress::fromString($command->email),
            PlainPassword::fromString($command->plainPassword),
            new Name($command->firstName, $command->lastName)
        );

        $this->customerRepository->store($newCustomer);
    }
}
