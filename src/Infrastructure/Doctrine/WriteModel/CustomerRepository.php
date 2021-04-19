<?php

declare(strict_types=1);

namespace BookShop\Infrastructure\Doctrine\WriteModel;

use BookShop\Domain\Customer\Customer;
use BookShop\Domain\Customer\CustomerCollection;
use BookShop\Domain\Customer\EmailAddress;
use Doctrine\ORM\EntityManagerInterface;

class CustomerRepository implements \BookShop\Domain\Customer\CustomerRepository, CustomerCollection
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function store(Customer $customer): void
    {
        $this->entityManager->persist($customer);
        $this->entityManager->flush();
    }

    public function containsUserWithEmail(EmailAddress $emailAddress): bool
    {
        $query = $this->entityManager->createQuery(<<<DQL
SELECT COUNT(c)
FROM BookShop\Domain\Customer\Customer c
WHERE c.email = :email
DQL);

        $query->setParameter('email', $emailAddress);

        $count = $query->getSingleScalarResult();

        return $count > 0;
    }
}
