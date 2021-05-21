<?php

declare(strict_types=1);

namespace BookShop\Tests\Unit\Application\Command\BackOffice\Customer;

use BookShop\Application\Command\BackOffice\Customer\SignUp;
use BookShop\Application\Command\BackOffice\Customer\SignUpHandler;
use BookShop\Domain\Common\Event\EventBus;
use BookShop\Domain\Customer\Customer;
use BookShop\Domain\Customer\CustomerRepository;
use BookShop\Domain\Customer\CustomerSignedUp;
use BookShop\Domain\Customer\EmailAddress;
use BookShop\Domain\Customer\SignUpFailed;
use BookShop\Domain\Customer\UniqueEmailAddressSpecification;
use BookShop\Infrastructure\Adapters\SystemClock;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Prophecy\PhpUnit\ProphecyTrait;

class SignUpHandlerTest extends TestCase
{
    use ProphecyTrait;

    public function test_it_sign_up_the_new_customer(): void
    {
        // Arrange

        $uniqueEmailAddressSpecification = $this->prophesize(UniqueEmailAddressSpecification::class);
        $uniqueEmailAddressSpecification
            ->isSatisfiedBy(EmailAddress::fromString('patrick.fazzi@test.com'))
            ->willReturn(true);

        $eventBus = $this->prophesize(EventBus::class);

        $customerRepository = $this->prophesize(CustomerRepository::class);

        $handler = new SignUpHandler(
            new SystemClock(),
            $eventBus->reveal(),
            $customerRepository->reveal(),
            $uniqueEmailAddressSpecification->reveal(),
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

        $eventBus->dispatch(Argument::type(CustomerSignedUp::class))
            ->shouldHaveBeenCalledOnce();
    }

    public function test_it_doesnt_allow_to_sign_up_with_an_already_used_email_address(): void
    {
        self::expectException(SignUpFailed::class);

        // Arrange

        $uniqueEmailAddressSpecification = $this->prophesize(UniqueEmailAddressSpecification::class);
        $uniqueEmailAddressSpecification
            ->isSatisfiedBy(EmailAddress::fromString('patrick.fazzi@test.com'))
            ->willReturn(false);

        $eventBus = $this->prophesize(EventBus::class);

        $customerRepository = $this->prophesize(CustomerRepository::class);

        $handler = new SignUpHandler(
            new SystemClock(),
            $eventBus->reveal(),
            $customerRepository->reveal(),
            $uniqueEmailAddressSpecification->reveal(),
        );

        // Act

        $handler(new SignUp(
            '0a0bb6ea-0c00-4500-9ebd-bdb991363bd6',
            'patrick.fazzi@test.com',
            'p4ssW0rd',
            'Patrick',
            'Fazzi'
        ));
    }
}
