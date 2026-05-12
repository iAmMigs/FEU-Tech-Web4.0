<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AcademicsController extends AbstractController
{
    private function renderWithDefaults(string $view, array $params = []): Response
    {
        return $this->render($view, array_merge($params, [
            'controller_name' => 'AboutController',
        ]));
    }

    #[Route('/academics/miles', name: 'app_miles')]
    public function Miles(): Response
    {
        return $this->renderWithDefaults('Academics/miles.html.twig');
    }

}