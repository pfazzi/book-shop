<?php

declare(strict_types=1);

namespace BookShop\Infrastructure\Ports\BackOfficeApi\Controller;

use BookShop\Application\Command\BackOffice\Author\AddAuthor;
use BookShop\Application\Command\BackOffice\Author\EditAuthor;
use BookShop\Application\Command\CommandBus;
use BookShop\Application\Query\BackOffice\Author\AuthorRepository as AuthorQueryRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use function count;
use function json_decode;
use function sprintf;

#[Route(path: '/authors')]
class AuthorsController
{
    #[Route(methods: ['GET'])]
    public function listAction(AuthorQueryRepository $authorRepository): Response
    {
        $authors = $authorRepository->getAll();

        $response = new JsonResponse($authors);

        $unit       = 'authors';
        $rangeStart = 0;
        $rangeEnd   = count($authors);
        $response->headers->set(
            'Content-Range',
            sprintf('%s %d-%d/%d', $unit, $rangeStart, $rangeEnd, $rangeEnd)
        );

        return $response;
    }

    #[Route(path: '/{id}', methods: ['GET'])]
    public function showAction(Request $request, AuthorQueryRepository $authorRepository): Response
    {
        $author = $authorRepository->get($request->get('id'));

        return new JsonResponse($author);
    }

    #[Route(methods: ['POST'])]
    public function createAction(Request $request, CommandBus $commandBus, AuthorQueryRepository $authorRepository): Response
    {
        $body = json_decode($request->getContent(), true);

        $commandBus->dispatch(new AddAuthor(...$body));

        $author = $authorRepository->get($body['id']);

        return new JsonResponse($author, Response::HTTP_CREATED);
    }

    #[Route(path: '/{id}', methods: ['PUT'])]
    public function editAction(Request $request, CommandBus $commandBus, AuthorQueryRepository $authorRepository): Response
    {
        $body = json_decode($request->getContent(), true);

        $commandBus->dispatch(new EditAuthor(...$body));

        $author = $authorRepository->get($body['id']);

        return new JsonResponse($author, Response::HTTP_CREATED);
    }
}
