<?php
declare(strict_types=1);

namespace BookShop\Ports\BackOfficeApi\Controller;

use BookShop\Application\Query\BackOffice\Author\AuthorRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthorsController
{
    #[Route(path: '/books', methods: ['GET'])]
    public function listAction(AuthorRepository $authorRepository): Response
    {
        return new JsonResponse(
            $authorRepository->findAll(),
        );
    }
}