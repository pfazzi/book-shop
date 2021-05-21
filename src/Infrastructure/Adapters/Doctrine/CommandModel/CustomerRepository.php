<?php

declare(strict_types=1);

namespace BookShop\Infrastructure\Adapters\Doctrine\CommandModel;

use BookShop\Domain\Customer\Customer;
use BookShop\Domain\Customer\EmailAddress;
use BookShop\Domain\Customer\UniqueEmailAddressSpecification;
use Doctrine\ORM\EntityManagerInterface;

class CustomerRepository implements \BookShop\Domain\Customer\CustomerRepository, UniqueEmailAddressSpecification
{
    public function __construct(
        private EntityManagerInterface $entityManager
    ) {
    }

    public function store(Customer $customer): void
    {
        $this->entityManager->persist($customer);
    }

    public function isSatisfiedBy(EmailAddress $emailAddress): bool
    {
        $query = $this->entityManager->createQuery(<<<DQL
            SELECT COUNT(c)
            FROM BookShop\Domain\Customer\Customer c
            WHERE c.emailAddress = :emailAddress
            DQL);

        $query->setParameter('emailAddress', $emailAddress->toString());

        $count = (int) $query->getSingleScalarResult();

        return $count === 0;
    }

    public function get(EmailAddress $emailAddress): Customer
    {
        $query = $this->entityManager->createQuery(<<<DQL
            SELECT c
            FROM BookShop\Domain\Customer\Customer c
            WHERE c.emailAddress = :emailAddress
            DQL);

        $query->setParameter('emailAddress', $emailAddress);

        return $query->getSingleResult();
    }
}
