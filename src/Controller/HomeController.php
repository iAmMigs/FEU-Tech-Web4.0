<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    private function renderWithDefaults(string $view, array $params = []): Response
    {
        return $this->render($view, array_merge($params, [
            'controller_name' => 'HomeController',
        ]));
    }


    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->renderWithDefaults('home/index.html.twig');
    }
}
