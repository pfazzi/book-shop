<?php
declare(strict_types=1);

namespace BookShop\Infrastructure\Ports\Api\Controller;

use BookShop\Application\ViewModel\Book\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthorsController extends AbstractController
{
    #[Route(path: '/books', methods: ['GET'])]
    public function listAction(BookRepository $bookRepository): Response
    {
        return new JsonResponse(
            $bookRepository->listAll(),
        );
    }
}