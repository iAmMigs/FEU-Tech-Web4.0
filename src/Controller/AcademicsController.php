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
    
    #[Route('/academics/ccsma', name: 'app_ccsma')]
    public function CCSMA(): Response
    {
        return $this->renderWithDefaults('Academics/ccsma.html.twig');
    }

    #[Route('/academics/coe', name: 'app_coe')]
    public function COE(): Response
    {
        return $this->renderWithDefaults('Academics/coe.html.twig');
    }

    #[Route('/academics/gened', name: 'app_gened')]
    public function GENED(): Response
    {
        return $this->renderWithDefaults('Academics/gened.html.twig');
    }
    
    #[Route('/academics/registrar', name: 'app_registrar')]
    public function REGISTRAR(): Response
    {
        return $this->renderWithDefaults('Academics/registrar.html.twig');
    }

        #[Route('/academics/library', name: 'app_library')]
    public function LIBRARY(): Response
    {
        return $this->renderWithDefaults('Academics/library.html.twig');
    }
}