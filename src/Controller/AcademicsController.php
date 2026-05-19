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

            #[Route('/academics/bscs', name: 'app_bscs')]
            public function BSCS(): Response
            {
                return $this->renderWithDefaults('Academics/ccsma/bscs.html.twig');
            }

            #[Route('/academics/bsit', name: 'app_bsit')]
            public function BSIT(): Response
            {
                return $this->renderWithDefaults('Academics/ccsma/bsit.html.twig');
            }

            #[Route('/academics/bma', name: 'app_bma')]
            public function BMA(): Response
            {
                return $this->renderWithDefaults('Academics/ccsma/bma.html.twig');
            }

            #[Route('/academics/bscst', name: 'app_bscst')]
            public function BSCST(): Response
            {
                return $this->renderWithDefaults('Academics/ccsma/bscst.html.twig');
            }

            #[Route('/academics/bdmm', name: 'app_bdmm')]
            public function BDMM(): Response
            {
                return $this->renderWithDefaults('Academics/ccsma/bdmm.html.twig');
            }

            #[Route('/academics/bsfintech', name: 'app_bsfintech')]
            public function BSFINTECH(): Response
            {
                return $this->renderWithDefaults('Academics/ccsma/bsfintech.html.twig');
            }


    #[Route('/academics/coe', name: 'app_coe')]
    public function COE(): Response
    {
        return $this->renderWithDefaults('Academics/coe.html.twig');
    }
    
            #[Route('/academics/bscem', name: 'app_bscem')]
            public function BSCEM(): Response
            {
                return $this->renderWithDefaults('Academics/coe/bscem.html.twig');
            }

            
            #[Route('/academics/bsce', name: 'app_bsce')]
            public function BSCE(): Response
            {
                return $this->renderWithDefaults('Academics/coe/bsce.html.twig');
            }

             #[Route('/academics/bscpe', name: 'app_bscpe')]
            public function BSCPE(): Response
            {
                return $this->renderWithDefaults('Academics/coe/bscpe.html.twig');
            }

            #[Route('/academics/bsee', name: 'app_bsee')]
            public function BSEE(): Response
            {
                return $this->renderWithDefaults('Academics/coe/bsee.html.twig');
            }

            #[Route('/academics/bsece', name: 'app_bsece')]
            public function BSECE(): Response
            {
                return $this->renderWithDefaults('Academics/coe/bsece.html.twig');
            }

            #[Route('/academics/bsme', name: 'app_bsme')]
            public function BSME(): Response
            {
                return $this->renderWithDefaults('Academics/coe/bsme.html.twig');
            }


    #[Route('/academics/gened', name: 'app_gened')]
    public function GENED(): Response
    {
        return $this->renderWithDefaults('Academics/gened.html.twig');
    }

            #[Route('/academics/hsc', name: 'app_hsc')]
            public function HSC(): Response
            {
                return $this->renderWithDefaults('Academics/gened/hsc.html.twig');
            }

            #[Route('/academics/mps', name: 'app_mps')]
            public function MPS(): Response
            {
                return $this->renderWithDefaults('Academics/gened/mps.html.twig');
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