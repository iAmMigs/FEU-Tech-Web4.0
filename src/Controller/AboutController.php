<?php

namespace App\Controller;

use App\Entity\AboutVisionMision;
use App\Entity\HistoryItem;
use App\Entity\HistoryFooter;
use App\Entity\AboutAcademicDirector;
use App\Entity\AboutExecutiveOfficer;
use App\Entity\AboutAcademicService;
use App\Entity\AboutNonAcademicDirector;
use App\Entity\AboutOffice;
use App\Entity\AboutFacilitiesPage;
use App\Entity\AboutFacilitiesTab;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AboutController extends AbstractController
{
    private function renderWithDefaults(string $view, array $params = []): Response
    {
        return $this->render('user/' . ltrim($view, '/'), array_merge($params, [
            'controller_name' => 'AboutController',
        ]));
    }

    #[Route('/about/facts-and-history', name: 'app_facts_history')]
        public function factsHistory(EntityManagerInterface $em): Response
        {
            $timeline = $em->getRepository(HistoryItem::class)->findBy([], ['year' => 'ASC']);
            $footer = $em->getRepository(HistoryFooter::class)->findOneBy([]) ?? new HistoryFooter();

            return $this->renderWithDefaults('About/facts_history.html.twig', [
                'timeline' => $timeline,
                'footer' => $footer
            ]);
    }

    #[Route('/about/vision-mision', name: 'app_vision_mision')]
    public function visionMision(EntityManagerInterface $em): Response
    {
        $content = $em->getRepository(AboutVisionMision::class)->findOneBy([]);

        return $this->render('user/About/vision_mision.html.twig', [
            'content' => $content,
        ]);
    }

    
    #[Route('/about/facilities', name: 'app_facilities')]
    public function facilities(EntityManagerInterface $em): Response
    {
        $pageData = $em->getRepository(AboutFacilitiesPage::class)->find(1);
        $tabCollection = $em->getRepository(AboutFacilitiesTab::class)->findBy([], ['sortOrder' => 'ASC']);

        if (!$pageData) {
            throw $this->createNotFoundException('Facilities structural management config data missing entry index #1.');
        }

        return $this->render('user/About/facilities.html.twig', [
            'page' => $pageData,
            'tabs' => $tabCollection
        ]);
    }

    #[Route('/about/executive-officers', name: 'app_executive_officers')]
    public function executiveOfficers(EntityManagerInterface $em): Response
    {
        $featuredOfficers = $em->getRepository(AboutExecutiveOfficer::class)
            ->findBy(['isFeatured' => true], ['id' => 'ASC']);

        $regularOfficers = $em->getRepository(AboutExecutiveOfficer::class)
            ->findBy(['isFeatured' => false], ['id' => 'ASC']);

        return $this->render('user/About/executive_officers.html.twig', [
            'featured_officers' => $featuredOfficers,
            'officers' => $regularOfficers,
        ]);
    }

    #[Route('/about/academic-directors', name: 'app_academic_directors')]
    public function academicDirectors(EntityManagerInterface $em): Response
    {
        $directors = $em->getRepository(AboutAcademicDirector::class)->findBy([], ['id' => 'ASC']);

        return $this->render('user/About/academic_director.html.twig', [
            'directors' => $directors,
        ]);
    }

    #[Route('/about/academic-services', name: 'app_academic_services')]
    public function academicServices(EntityManagerInterface $em): Response
    {
        $services = $em->getRepository(AboutAcademicService::class)->findBy([], ['id' => 'ASC']);

        return $this->render('user/About/academic_services.html.twig', [
            'services' => $services,
        ]);
    }

    #[Route('/about/non-academic-directors', name: 'app_non_academic_directors')]
    public function nonAcademicDirectors(EntityManagerInterface $em): Response
    {
        $directors = $em->getRepository(AboutNonAcademicDirector::class)->findBy([], ['id' => 'ASC']);

        return $this->render('user/About/non_academic_directors.html.twig', [
            'directors' => $directors,
        ]);
    }

    //OFFICES
   #[Route('/about/offices/{slug}', name: 'app_about_office_detail')]
    public function showOffice(string $slug, EntityManagerInterface $em): Response
    {
        $office = $em->getRepository(AboutOffice::class)->findOneBy(['slug' => $slug]);

        if (!$office) {
            throw $this->createNotFoundException('The requested office profile does not exist.');
        }

        return $this->render('user/About/offices/detail.html.twig', [
            'office' => $office
        ]);
    }
}