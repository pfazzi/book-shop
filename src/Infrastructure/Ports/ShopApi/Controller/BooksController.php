<?php

declare(strict_types=1);

namespace BookShop\Infrastructure\Ports\ShopApi\Controller;

use BookShop\Application\Query\Shop\Book\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BooksController extends AbstractController
{
    #[Route(path: '/books', methods: ['GET'])]
    public function listAction(BookRepository $bookRepository): Response
    {
        return new JsonResponse(
            $bookRepository->findAll(),
        );
    }
}
