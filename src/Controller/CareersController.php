<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CareersController extends AbstractController
{
    private function renderWithDefaults(string $view, array $params = []): Response
    {
        return $this->render('user/' . ltrim($view, '/'), array_merge($params, [
            'controller_name' => 'CareersController',
        ]));
    }

    #[Route('/job-posting', name: 'app_careers')]
    public function index(): Response
    {
        return $this->renderWithDefaults('Careers/index.html.twig');
    }
}
