<?php

declare(strict_types=1);

namespace BookShop\Tests\Unit\Application\Command\BackOffice\Customer;

use BookShop\Application\Command\BackOffice\Customer\SignUp;
use BookShop\Application\Command\BackOffice\Customer\SignUpHandler;
use BookShop\Domain\Customer\Customer;
use BookShop\Domain\Customer\CustomerCollection;
use BookShop\Domain\Customer\CustomerFactory;
use BookShop\Domain\Customer\CustomerRepository;
use BookShop\Domain\Customer\EmailAddress;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Prophecy\PhpUnit\ProphecyTrait;

class SignUpHandlerTest extends TestCase
{
    use ProphecyTrait;

    public function test_it_handles_the_command(): void
    {
        // Arrange

        $customerCollection = $this->prophesize(CustomerCollection::class);
        $customerCollection
            ->containsUserWithEmail(EmailAddress::fromString('patrick.fazzi@test.com'))
            ->willReturn(false);

        $customerRepository = $this->prophesize(CustomerRepository::class);

        $handler = new SignUpHandler(
            new CustomerFactory($customerCollection->reveal()),
            $customerRepository->reveal()
        );

        // Act

        $handler(new SignUp(
            '0a0bb6ea-0c00-4500-9ebd-bdb991363bd6',
            'patrick.fazzi@test.com',
            'p4ssW0rd',
            'Patrick',
            'Fazzi'
        ));

        // Assert

        $customerRepository->store(Argument::type(Customer::class))
            ->shouldHaveBeenCalledOnce();
    }
}
