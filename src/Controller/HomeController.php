<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    private function renderWithDefaults(string $view, array $params = []): Response
    {
        return $this->render('user/' . ltrim($view, '/'), array_merge($params, [
            'controller_name' => 'HomeController',
        ]));
    }


    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->renderWithDefaults('home/index.html.twig');
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->renderWithDefaults('home/contact.html.twig');
    }

    
            #[Route('/features/shaping-the-future-of-education-utah-valley-university-feu-tech-unite-for-ai-innovation-workshop', name: 'event_one')]
            public function event_one(): Response
            {
                return $this->renderWithDefaults('home/events/event_one.html.twig');
            }

            #[Route('/features/taranasapiyu-2026-welcoming-the-next-generation-of-innovators-at-feu-tech', name: 'event_two')]
            public function event_two(): Response
            {
                return $this->renderWithDefaults('home/events/event_two.html.twig');
            }

            #[Route('/features/ftic-ramps-up-the-culture-of-innovation-at-feu-tech-with-a-campus-wide-symposium', name: 'event_three')]
            public function event_three(): Response
            {
                return $this->renderWithDefaults('home/events/event_three.html.twig');
            }

    #[Route('/terms-and-conditions', name: 'app_terms_and_conditions')]
    public function termsAndConditions(): Response
    {
        return $this->renderWithDefaults('legal/terms_and_conditions.html.twig');
    }
    

    #[Route('/privacy-policy', name: 'app_privacy_policy')]
    public function privacyPolicy(): Response
    {
        return $this->renderWithDefaults('legal/privacy_policy.html.twig');
    }
}
