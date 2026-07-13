<?php

namespace App\Controller;

use App\Entity\JobOpportunity;
use App\Entity\JobCareers;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CareersController extends AbstractController
{
    private function renderWithDefaults(string $view, array $params = []): Response
    {
        return $this->render('user/' . ltrim($view, '/'), array_merge($params, [
            'controller_name' => 'CareersController',
        ]));
    }

    #[Route('/job-posting', name: 'app_careers')]
    public function index(EntityManagerInterface $em): Response
    {
        $jobs = $em->getRepository(JobOpportunity::class)->findAll();
        $configs = $em->getRepository(JobCareers::class)->findAll();

        $textSettings = [
            'careers_badge' => 'Join Our Team',
            'careers_title_yellow' => "WE'RE",
            'careers_title_white' => 'HIRING',
            'careers_subtitle' => 'Be part of an institution driven by innovation. Shape the future of technology and education with us.',
            'careers_button_text' => 'View Open Positions',
            'careers_hr_email' => 'hr@feutech.edu.ph',
            'careers_subject_format' => 'Position_LastName, FirstName',
        ];

        // Maps database records over the fallbacks
        foreach ($configs as $config) {
            if (array_key_exists($config->getKey(), $textSettings)) {
                $textSettings[$config->getKey()] = $config->getValue();
            }
        }

        return $this->renderWithDefaults('Careers/index.html.twig', [
            'jobs' => $jobs,
            'content' => $textSettings
        ]);
    }
}