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

    #[Route('/about/facts-and-history', name: 'app_facts_history')]
    public function factsHistory(): Response
    {
        return $this->renderWithDefaults('About/facts_history.html.twig');
    }

    #[Route('/about/vision-mision', name: 'app_vision_mision')]
    public function visionMision(): Response
    {
        return $this->renderWithDefaults('About/vision_mision.html.twig');
    }

    #[Route('/about/facilities', name: 'app_facilities')]
    public function facilities(): Response
    {
        return $this->renderWithDefaults('About/facilities.html.twig');
    }

    #[Route('/about/executive-officers', name: 'app_executive_officers')]
    public function executiveOfficers(): Response
    {
        return $this->renderWithDefaults('About/executive_officers.html.twig');
    }

    #[Route('/about/academic-directors', name: 'app_academic_directors')]
    public function academicDirectors(): Response
    {
        return $this->renderWithDefaults('About/academic_director.html.twig');
    }

    #[Route('/about/academic-services', name: 'app_academic_services')]
    public function academicServices(): Response
    {
        return $this->renderWithDefaults('About/academic_services.html.twig');
    }

    #[Route('/about/non-academic-directors', name: 'app_non_academic_directors')]
    public function nonAcademicDirectors(): Response
    {
        return $this->renderWithDefaults('About/non_academic_directors.html.twig');
    }

    //OFFICES
    #[Route('/about/offices/co', name: 'app_communications_office')]
    public function CommunicationsOffice(): Response
    {
        return $this->renderWithDefaults('About/offices/co.html.twig');
    }

    #[Route('/about/offices/aero', name: 'app_admissionsandexternalrelationsoffice')]
    public function AdmissionsandExternalRelationsOffice(): Response
    {
        return $this->renderWithDefaults('About/offices/aero.html.twig');
    }

    #[Route('/about/offices/fo', name: 'app_facilitiesoffice')]
    public function facilitiesOffice(): Response
    {
        return $this->renderWithDefaults('About/offices/fo.html.twig');
    }

    #[Route('/about/offices/finance', name: 'app_financeoffice')]
    public function financeOffice(): Response
    {
        return $this->renderWithDefaults('About/offices/finance.html.twig');
    }

    #[Route('/about/offices/hro', name: 'app_humanresourcesoffice')]
    public function humanresourcesOffice(): Response
    {
        return $this->renderWithDefaults('About/offices/hro.html.twig');
    }

    #[Route('/about/offices/ialap', name: 'app_ialapoffice')]
    public function ialapOffice(): Response
    {
        return $this->renderWithDefaults('About/offices/ialap.html.twig');
    }

    #[Route('/about/offices/itso', name: 'app_itsooffice')]
    public function itsoOffice(): Response
    {
        return $this->renderWithDefaults('About/offices/itso.html.twig');
    }
    
    #[Route('/about/offices/qao', name: 'app_qaooffice')]
    public function qaooffice(): Response
    {
        return $this->renderWithDefaults('About/offices/qao.html.twig');
    }
}