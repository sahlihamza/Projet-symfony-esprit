<?php

namespace App\Controller;

use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BookController extends AbstractController
{
    #[Route('/book', name: 'app_book')]
    public function index(): Response
    {
        return $this->render('book/index.html.twig', [
            'controller_name' => 'BookController',
        ]);
    }
    #[Route('/showBooks', name: 'app_books')]
    public function ShowAllBooks(BookRepository $repository):Response{
        $books = $repository->findAll();

        // Retourner la vue Twig avec la liste des livres
        return $this->render('book/index.html.twig', [
            'books' => $books,
        ]);

    }
}
