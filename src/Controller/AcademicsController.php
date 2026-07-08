<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\AcademicsDepartment;
use App\Entity\AcademicsProgram;
use App\Entity\AcademicsMiles;
use App\Entity\AcademicsMilesAddon;
use App\Entity\AcademicsRegistrar;
use App\Entity\AcademicsLibrary;

final class AcademicsController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    private function renderWithDefaults(string $view, array $params = []): Response
    {
        return $this->render('user/' . ltrim($view, '/'), array_merge($params, [
            'controller_name' => 'AcademicsController',
        ]));
    }

    #[Route('/academics/miles', name: 'app_miles')]
    public function Miles(): Response
    {
        $page = $this->entityManager->getRepository(AcademicsMiles::class)->findOneBy([]) ?? new AcademicsMiles();
        $addons = $this->entityManager->getRepository(AcademicsMilesAddon::class)->findAll();

        return $this->renderWithDefaults('Academics/miles.html.twig', [
            'page' => $page,
            'addons' => $addons,
        ]);
    }
    
    #[Route('/academics/ccsma', name: 'app_ccsma')]
    public function CCSMA(): Response
    {
        $dept = $this->entityManager->getRepository(AcademicsDepartment::class)->findOneBy(['slug' => 'ccsma']) ?? new AcademicsDepartment();
        return $this->renderWithDefaults('Academics/ccsma.html.twig', [
            'department' => $dept,
        ]);
    }

    #[Route('/academics/bscs', name: 'app_bscs')]
    public function BSCS(): Response
    {
        $program = $this->entityManager->getRepository(AcademicsProgram::class)->findOneBy(['slug' => 'bscs']) ?? new AcademicsProgram();
        return $this->renderWithDefaults('Academics/ccsma/bscs.html.twig', [
            'program' => $program,
        ]);
    }

    #[Route('/academics/bsit', name: 'app_bsit')]
    public function BSIT(): Response
    {
        $program = $this->entityManager->getRepository(AcademicsProgram::class)->findOneBy(['slug' => 'bsit']) ?? new AcademicsProgram();
        return $this->renderWithDefaults('Academics/ccsma/bsit.html.twig', [
            'program' => $program,
        ]);
    }

    #[Route('/academics/bma', name: 'app_bma')]
    public function BMA(): Response
    {
        $program = $this->entityManager->getRepository(AcademicsProgram::class)->findOneBy(['slug' => 'bma']) ?? new AcademicsProgram();
        return $this->renderWithDefaults('Academics/ccsma/bma.html.twig', [
            'program' => $program,
        ]);
    }

    #[Route('/academics/bscst', name: 'app_bscst')]
    public function BSCST(): Response
    {
        $program = $this->entityManager->getRepository(AcademicsProgram::class)->findOneBy(['slug' => 'bscst']) ?? new AcademicsProgram();
        return $this->renderWithDefaults('Academics/ccsma/bscst.html.twig', [
            'program' => $program,
        ]);
    }

    #[Route('/academics/bdmm', name: 'app_bdmm')]
    public function BDMM(): Response
    {
        $program = $this->entityManager->getRepository(AcademicsProgram::class)->findOneBy(['slug' => 'bdmm']) ?? new AcademicsProgram();
        return $this->renderWithDefaults('Academics/ccsma/bdmm.html.twig', [
            'program' => $program,
        ]);
    }

    #[Route('/academics/bsfintech', name: 'app_bsfintech')]
    public function BSFINTECH(): Response
    {
        $program = $this->entityManager->getRepository(AcademicsProgram::class)->findOneBy(['slug' => 'bsfintech']) ?? new AcademicsProgram();
        return $this->renderWithDefaults('Academics/ccsma/bsfintech.html.twig', [
            'program' => $program,
        ]);
    }

    #[Route('/academics/coe', name: 'app_coe')]
    public function COE(): Response
    {
        $dept = $this->entityManager->getRepository(AcademicsDepartment::class)->findOneBy(['slug' => 'coe']) ?? new AcademicsDepartment();
        return $this->renderWithDefaults('Academics/coe.html.twig', [
            'department' => $dept,
        ]);
    }
    
    #[Route('/academics/bscem', name: 'app_bscem')]
    public function BSCEM(): Response
    {
        $program = $this->entityManager->getRepository(AcademicsProgram::class)->findOneBy(['slug' => 'bscem']) ?? new AcademicsProgram();
        return $this->renderWithDefaults('Academics/coe/bscem.html.twig', [
            'program' => $program,
        ]);
    }
    
    #[Route('/academics/bsce', name: 'app_bsce')]
    public function BSCE(): Response
    {
        $program = $this->entityManager->getRepository(AcademicsProgram::class)->findOneBy(['slug' => 'bsce']) ?? new AcademicsProgram();
        return $this->renderWithDefaults('Academics/coe/bsce.html.twig', [
            'program' => $program,
        ]);
    }

    #[Route('/academics/bscpe', name: 'app_bscpe')]
    public function BSCPE(): Response
    {
        $program = $this->entityManager->getRepository(AcademicsProgram::class)->findOneBy(['slug' => 'bscpe']) ?? new AcademicsProgram();
        return $this->renderWithDefaults('Academics/coe/bscpe.html.twig', [
            'program' => $program,
        ]);
    }

    #[Route('/academics/bsee', name: 'app_bsee')]
    public function BSEE(): Response
    {
        $program = $this->entityManager->getRepository(AcademicsProgram::class)->findOneBy(['slug' => 'bsee']) ?? new AcademicsProgram();
        return $this->renderWithDefaults('Academics/coe/bsee.html.twig', [
            'program' => $program,
        ]);
    }

    #[Route('/academics/bsece', name: 'app_bsece')]
    public function BSECE(): Response
    {
        $program = $this->entityManager->getRepository(AcademicsProgram::class)->findOneBy(['slug' => 'bsece']) ?? new AcademicsProgram();
        return $this->renderWithDefaults('Academics/coe/bsece.html.twig', [
            'program' => $program,
        ]);
    }

    #[Route('/academics/bsme', name: 'app_bsme')]
    public function BSME(): Response
    {
        $program = $this->entityManager->getRepository(AcademicsProgram::class)->findOneBy(['slug' => 'bsme']) ?? new AcademicsProgram();
        return $this->renderWithDefaults('Academics/coe/bsme.html.twig', [
            'program' => $program,
        ]);
    }

    #[Route('/academics/gened', name: 'app_gened')]
    public function GENED(): Response
    {
        $dept = $this->entityManager->getRepository(AcademicsDepartment::class)->findOneBy(['slug' => 'gened']) ?? new AcademicsDepartment();
        return $this->renderWithDefaults('Academics/gened.html.twig', [
            'department' => $dept,
        ]);
    }

    #[Route('/academics/hsc', name: 'app_hsc')]
    public function HSC(): Response
    {
        $program = $this->entityManager->getRepository(AcademicsProgram::class)->findOneBy(['slug' => 'hsc']) ?? new AcademicsProgram();
        return $this->renderWithDefaults('Academics/gened/hsc.html.twig', [
            'program' => $program,
        ]);
    }

    #[Route('/academics/mps', name: 'app_mps')]
    public function MPS(): Response
    {
        $program = $this->entityManager->getRepository(AcademicsProgram::class)->findOneBy(['slug' => 'mps']) ?? new AcademicsProgram();
        return $this->renderWithDefaults('Academics/gened/mps.html.twig', [
            'program' => $program,
        ]);
    }
    
    #[Route('/academics/registrar', name: 'app_registrar')]
    public function REGISTRAR(): Response
    {
        $page = $this->entityManager->getRepository(AcademicsRegistrar::class)->findOneBy([]) ?? new AcademicsRegistrar();
        return $this->renderWithDefaults('Academics/registrar.html.twig', [
            'page' => $page,
        ]);
    }

    #[Route('/academics/library', name: 'app_library')]
    public function LIBRARY(): Response
    {
        $page = $this->entityManager->getRepository(AcademicsLibrary::class)->findOneBy([]) ?? new AcademicsLibrary();
        return $this->renderWithDefaults('Academics/library.html.twig', [
            'page' => $page,
        ]);
    }

    #[Route('/academics/{slug}', name: 'app_program_detail')]
    public function programDetail(string $slug): Response
    {
        $program = $this->entityManager->getRepository(AcademicsProgram::class)->findOneBy(['slug' => $slug]);
        if (!$program) {
            throw $this->createNotFoundException('Program not found');
        }

        $deptSlug = $program->getDepartment() ? $program->getDepartment()->getSlug() : 'coe';
        $projectDir = $this->getParameter('kernel.project_dir');
        $templatePath = $projectDir . '/templates/user/Academics/' . $deptSlug . '/' . $slug . '.html.twig';
        
        $template = file_exists($templatePath)
            ? 'Academics/' . $deptSlug . '/' . $slug . '.html.twig'
            : 'Academics/program_detail.html.twig';

        return $this->renderWithDefaults($template, [
            'program' => $program,
        ]);
    }
}