<?php

declare(strict_types=1);

namespace BookShop\Ports\BackOfficeApi\Controller;

use BookShop\Application\Query\BackOffice\Book\BookRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BooksController
{
    #[Route(path: '/books', methods: ['GET'])]
    public function listAction(BookRepository $bookRepository): Response
    {
        return new JsonResponse(
            $bookRepository->findAll(),
        );
    }
}
