<?php

namespace App\Controller;

use App\Repository\StudentJourneySaRepository;
use App\Repository\StudentJourneyDuRepository;
use App\Repository\StudentJourneySoRepository;
use App\Repository\StudentJourneySoOrganizationRepository;
use App\Repository\StudentJourneySpecialSoOrganizationRepository;
use App\Repository\StudentJourneyCommunityExtensionRepository;
use App\Repository\StudentJourneyCommunityExtensionProgramsRepository;
use App\Repository\StudentJourneyHealthServiceProgramsRepository;
use App\Repository\StudentJourneyHealthServiceRepository;
use App\Repository\StudentJourneyGuidanceRepository;
use App\Repository\StudentJourneyGuidanceCounselingProgramsRepository;
use App\Repository\StudentJourneyIcareRepository;
use App\Repository\StudentJourneyIcareServicesRepository;
use App\Repository\StudentJourneyIalapRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class StudentJourneyController extends AbstractController
{
    private function renderWithDefaults(string $view, array $params = []): Response
    {
        return $this->render('user/' . ltrim($view, '/'), array_merge($params, [
            'controller_name' => 'StudentJourneyController',
        ]));
    }

    #[Route('/student-journey/guidance-counseling', name: 'app_student_journey_gcu')]
    public function guidanceCounseling(
        StudentJourneyGuidanceRepository $guidanceRepository,
        StudentJourneyGuidanceCounselingProgramsRepository $programsRepository
    ): Response {
        $content = $guidanceRepository->findOneBy([]);
        $programs = $programsRepository->findBy(['category' => 'program']);
        $coreServices = $programsRepository->findBy(['category' => 'core_service']);

        return $this->renderWithDefaults('StudentJourney/gcu.html.twig', [
            'content'      => $content,
            'programs'     => $programs,
            'coreServices' => $coreServices,
        ]);
    }

    #[Route('/student-journey/student-affairs', name: 'app_student_journey_sa')]
    public function studentAffairs(StudentJourneySaRepository $repository): Response
    {
        $content = $repository->findOneBy([]);

        return $this->render('user/StudentJourney/sa.html.twig', [
            'content' => $content
        ]);
    }

    #[Route('/student-journey/discipline-unit', name: 'app_student_journey_du')]
    public function disciplineUnit(StudentJourneyDuRepository $repository): Response
    {
        $content = $repository->findOneBy([]);

        return $this->render('user/StudentJourney/du.html.twig', [
            'content' => $content
        ]);
    }

    #[Route('/student-journey/student-organizations', name: 'app_student_journey_so')]
    public function studentOrganizations(
        StudentJourneySoRepository $soRepository,
        StudentJourneySoOrganizationRepository $academicRepository,
        StudentJourneySpecialSoOrganizationRepository $specialRepository
    ): Response {
        $content = $soRepository->findOneBy([]);
        $academicOrgs = $academicRepository->findAll();
        $specialOrgs = $specialRepository->findAll();

        return $this->render('user/StudentJourney/student_organizations.html.twig', [
            'content'      => $content,
            'academicOrgs' => $academicOrgs,
            'specialOrgs'  => $specialOrgs,
        ]);
    }

    #[Route('/student-journey/community-extension', name: 'app_student_journey_cesu')]
    public function communityExtension(
        StudentJourneyCommunityExtensionRepository $extensionRepository,
        StudentJourneyCommunityExtensionProgramsRepository $programsRepository
    ): Response {
        $content = $extensionRepository->findOneBy([]);
        $programs = $programsRepository->findAll();

        return $this->render('user/StudentJourney/community_extension.html.twig', [
            'content'  => $content,
            'programs' => $programs,
        ]);
    }

    #[Route('/student-journey/health-services', name: 'app_student_journey_hsu')]
    public function healthServices(
        StudentJourneyHealthServiceRepository $healthRepository,
        StudentJourneyHealthServiceProgramsRepository $programsRepository
    ): Response {
        $content = $healthRepository->findOneBy([]);
        $programs = $programsRepository->findAll();

        return $this->render('user/StudentJourney/health_services.html.twig', [
            'content'  => $content,
            'programs' => $programs,
        ]);
    }

    #[Route('/student-journey/icare', name: 'app_student_journey_icare')]
    public function icare(
        StudentJourneyIcareRepository $icareRepository,
        StudentJourneyIcareServicesRepository $servicesRepository
    ): Response {
        $content = $icareRepository->findOneBy([]);
        $programs = $servicesRepository->findAll();

        return $this->renderWithDefaults('StudentJourney/icare.html.twig', [
            'content'  => $content,
            'programs' => $programs,
        ]);
    }

    #[Route('/student-journey/ialap', name: 'app_student_journey_ialap')]
    public function ialap(
        StudentJourneyIalapRepository $ialapRepository
    ): Response {
        $content = $ialapRepository->findOneBy([]);

        return $this->render('user/StudentJourney/ialap.html.twig', [
            'content' => $content,
        ]);
    }
}