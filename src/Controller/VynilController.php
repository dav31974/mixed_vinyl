<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VynilController
{
    #[Route('/')]
    public function homepage(): Response
    {
        return new Response('home');
    }

    #[Route('/browse/{slug}')]
    public function browse(string $slug = null): Response
    {
        if ($slug) {
            $title = '<br>Genre: ' . u(str_replace('-', ' ', $slug))->title(true);  // fonction u() du composant string de symfony
        } else {
            $title = 'all genres';
        }
        return new Response('Browse vynil?' . $title);
    }
}
