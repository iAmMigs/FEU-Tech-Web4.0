<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AboutController extends AbstractController
{
    #[Route('/facts-and-history', name: 'app_facts_history')]
    public function FactsHistory(): Response
    {
        return $this->render('About/facts_history.html.twig', [
            'controller_name' => 'AboutController',
        ]);
    }

    #[Route('/vision-mision', name: 'app_vision_mision')]
    public function VisionMision(): Response
    {
        return $this->render('About/vision_mision.html.twig', [
            'controller_name' => 'AboutController',
        ]);
    }

    #[Route('/facilities', name: 'app_facilities')]
    public function Facilities(): Response
    {
        return $this->render('About/facilities.html.twig', [
            'controller_name' => 'AboutController',
        ]);
    }
}