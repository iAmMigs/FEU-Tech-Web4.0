<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AdmissionController extends AbstractController
{
    private function renderWithDefaults(string $view, array $params = []): Response
    {
        return $this->render($view, array_merge($params, [
            'controller_name' => 'AdmissionController',
        ]));
    }

    #[Route('/freshmen', name: 'app_admission_freshmen')]
    public function freshmen(): Response
    {
        return $this->renderWithDefaults('Admission/freshmen.html.twig');
    }

    #[Route('/transferees', name: 'app_admission_transferees')]
    public function transferees(): Response
    {
        return $this->renderWithDefaults('Admission/transferees.html.twig');
    }

    #[Route('/cross-enrollees', name: 'app_admission_cross_enrollees')]
    public function crossEnrollees(): Response
    {
        return $this->renderWithDefaults('Admission/cross_enrollees.html.twig');
    }

    #[Route('/second-degree', name: 'app_admission_second_degree')]
    public function secondDegree(): Response
    {
        return $this->renderWithDefaults('Admission/second_degree.html.twig');
    }

    #[Route('/international-students', name: 'app_admission_international_students')]
    public function internationalStudents(): Response
    {
        return $this->renderWithDefaults('Admission/international_students.html.twig');
    }

    #[Route('/scholarships-grants', name: 'app_admission_scholarships')]
    public function scholarships(): Response
    {
        return $this->renderWithDefaults('Admission/scholarships.html.twig');
    }

    #[Route('/tuition-fees', name: 'app_admission_tuition_fees')]
    public function tuitionFees(): Response
    {
        return $this->renderWithDefaults('Admission/tuition_fees.html.twig');
    }
}
