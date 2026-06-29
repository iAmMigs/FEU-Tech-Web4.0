<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MagazineController extends AbstractController
{
    private function renderWithDefaults(string $view, array $params = []): Response
    {
        return $this->render('user/' . ltrim($view, '/'), array_merge($params, [
            'controller_name' => 'MagazineController',
        ]));
    }

    #[Route('/magazine', name: 'app_magazine')]
    public function index(): Response
    {
        return $this->renderWithDefaults('Magazine/e-magazine.html.twig');
    }
}
