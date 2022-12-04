<?php

namespace App\Controller;

use App\Entity\Movie;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class MoviesController extends AbstractController
{
    public function __construct(private EntityManagerInterface $em)
    {
        //
    }

    #[Route('/movies', name: 'app_movies', methods: ['GET', 'HEAD'])]
    public function index(): Response
    {
        $repository = $this->em->getRepository(Movie::class);
        $movies = $repository->findAll();

        $movies = ["loki", "inception", "Pirates of the carribean"];
        return $this->render('index.html.twig', [
            'movies' => $movies
        ]);
    }

    #[Route('/movies{movie}', name: 'app_show_movie', defaults: ['name' => null] ,methods: ['GET', 'HEAD'])]
    public function show($movie): Response
    {
        return $this->render('show.html.twig', [
           'title' => $movie
        ]);
    }

    #[Route('/api/movies', name: 'app_api_movies')]
    public function indexApi(): JsonResponse
    {
        return $this->json([
                               'message' => "Welcome to the index page",
                               'path' => 'src/Controller/MoviesController.php',
                           ]);
    }
}
