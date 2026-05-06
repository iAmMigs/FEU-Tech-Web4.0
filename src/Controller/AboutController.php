<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AboutController extends AbstractController
{
    private function renderWithDefaults(string $view, array $params = []): Response
    {
        return $this->render($view, array_merge($params, [
            'controller_name' => 'AboutController',
        ]));
    }

    #[Route('/facts-and-history', name: 'app_facts_history')]
    public function factsHistory(): Response
    {
        return $this->renderWithDefaults('About/facts_history.html.twig');
    }

    #[Route('/facts-and-history-2', name: 'app_facts_history_2')]
    public function factsHistory2(): Response
    {
        return $this->renderWithDefaults('About/facts_history_2.html.twig');
    }


    #[Route('/vision-mision', name: 'app_vision_mision')]
    public function visionMision(): Response
    {
        return $this->renderWithDefaults('About/vision_mision.html.twig');
    }

    #[Route('/vision-mision-2', name: 'app_vision_mision_2')]
    public function visionMision2(): Response
    {
        return $this->renderWithDefaults('About/vision_mision_2.html.twig');
    }


    #[Route('/facilities', name: 'app_facilities')]
    public function facilities(): Response
    {
        return $this->renderWithDefaults('About/facilities.html.twig');
    }

    #[Route('/executive-officers', name: 'app_executive_officers')]
    public function executiveOfficers(): Response
    {
        return $this->renderWithDefaults('About/executive_officers.html.twig');
    }

    #[Route('/academic-directors', name: 'app_academic_directors')]
    public function academicDirectors(): Response
    {
        return $this->renderWithDefaults('About/academic_director.html.twig');
    }

    #[Route('/academic-services', name: 'app_academic_services')]
    public function academicServices(): Response
    {
        return $this->renderWithDefaults('About/academic_services.html.twig');
    }

    #[Route('/non-academic-directors', name: 'app_non_academic_directors')]
    public function nonAcademicDirectors(): Response
    {
        return $this->renderWithDefaults('About/non_academic_directors.html.twig');
    }
}