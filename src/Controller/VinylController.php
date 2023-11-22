<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class VinylController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function homepage(): Response
    {
        $tracks = [
            ['song' => 'gangstas paradise', 'artist' => 'coolio'],
            ['song' => 'waterfalls', 'artist' => 'tlc'],
            ['song' => 'creep', 'artist' => 'radiohead']
        ];
        return $this->render('vinyl/homepage.html.twig', [
            'tracks' => $tracks,
            'title' => 'pb and jams homepage'
        ]);
    }

    #[Route('/browse/{slug}', name: 'app_browse')]
    public function browse(string $slug = null): Response
    {
        if ($slug) {
            $title = 'Genre: ' . str_replace('-', ' ', $slug);
        } else {
            $title = 'All genres';
        }
        $genre = $title;
        return $this->render('vinyl/browse.html.twig', [
            'title' => $title,
            'genre' => $genre
        ]);
    }
}
