<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class StudentJourneyController extends AbstractController
{
    private function renderWithDefaults(string $view, array $params = []): Response
    {
        return $this->render($view, array_merge($params, [
            'controller_name' => 'StudentJourneyController',
        ]));
    }

    #[Route('/student-journey/guidance-counseling', name: 'app_student_journey_gcu')]
    public function guidanceCounseling(): Response
    {
        return $this->renderWithDefaults('StudentJourney/gcu.html.twig');
    }

    #[Route('/student-journey/student-affairs', name: 'app_student_journey_sa')]
    public function studentAffairs(): Response
    {
        return $this->renderWithDefaults('StudentJourney/sa.html.twig');
    }

    #[Route('/student-journey/discipline-unit', name: 'app_student_journey_du')]
    public function disciplineUnit(): Response
    {
        return $this->renderWithDefaults('StudentJourney/du.html.twig');
    }

    #[Route('/student-journey/student-organizations', name: 'app_student_journey_so')]
    public function studentOrganizations(): Response
    {
        return $this->renderWithDefaults('StudentJourney/student_organizations.html.twig');
    }

    #[Route('/student-journey/community-extension', name: 'app_student_journey_cesu')]
    public function communityExtension(): Response
    {
        return $this->renderWithDefaults('StudentJourney/community_extension.html.twig');
    }

    #[Route('/student-journey/health-services', name: 'app_student_journey_hsu')]
    public function healthServices(): Response
    {
        return $this->renderWithDefaults('StudentJourney/health_services.html.twig');
    }

    #[Route('/student-journey/icare', name: 'app_student_journey_icare')]
    public function icare(): Response
    {
        return $this->renderWithDefaults('StudentJourney/icare.html.twig');
    }

    #[Route('/student-journey/ialap', name: 'app_student_journey_ialap')]
    public function ialap(): Response
    {
        return $this->renderWithDefaults('StudentJourney/ialap.html.twig');
    }
}
