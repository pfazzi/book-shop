<?php

declare(strict_types=1);

namespace BookShop\Infrastructure\Ports\BackOfficeApi\Controller;

use BookShop\Application\Command\BackOffice\Book\AddBook;
use BookShop\Application\Command\BackOffice\Book\EditBook;
use BookShop\Application\Command\CommandBus;
use BookShop\Application\Query\BackOffice\Book\BookRepository as BookQueryRepository;
use BookShop\Application\Query\BackOffice\Book\BookRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use function count;
use function json_decode;
use function sprintf;

#[Route(path: '/books')]
class BooksController
{
    #[Route(methods: ['GET'])]
    public function listAction(BookRepository $bookRepository): Response
    {
        $books = $bookRepository->getAll();

        $response = new JsonResponse($books);

        $unit       = 'books';
        $rangeStart = 0;
        $rangeEnd   = count($books);
        $response->headers->set(
            'Content-Range',
            sprintf('%s %d-%d/%d', $unit, $rangeStart, $rangeEnd, $rangeEnd)
        );

        return $response;
    }

    #[Route(path: '/{id}', methods: ['GET'])]
    public function showAction(Request $request, BookQueryRepository $queryRepository): Response
    {
        $book = $queryRepository->get($request->get('id'));

        return new JsonResponse($book);
    }

    #[Route(methods: ['POST'])]
    public function createAction(Request $request, CommandBus $commandBus, BookQueryRepository $queryRepository): Response
    {
        $body = json_decode($request->getContent(), true);

        $commandBus->dispatch(new AddBook(...$body));

        $book = $queryRepository->get($body['id']);

        return new JsonResponse($book, Response::HTTP_CREATED);
    }

    #[Route(path: '/{id}', methods: ['PUT'])]
    public function editAction(Request $request, CommandBus $commandBus, BookQueryRepository $queryRepository): Response
    {
        $body = json_decode($request->getContent(), true);

        $commandBus->dispatch(new EditBook(...$body));

        $author = $queryRepository->get($body['id']);

        return new JsonResponse($author, Response::HTTP_CREATED);
    }
}
