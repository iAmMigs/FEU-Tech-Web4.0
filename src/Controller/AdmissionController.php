<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Page;
use App\Entity\AdmissionPages;
use App\Entity\AdmissionTuitionFees;
use App\Entity\AdmissionScholarships;
use App\Entity\ScholarshipItem;
use App\Entity\AdmissionFaqs;
use App\Entity\FaqItem;

use App\Entity\PaymentOption;

final class AdmissionController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    private function renderWithDefaults(string $view, array $params = []): Response
    {
        return $this->render('user/' . ltrim($view, '/'), array_merge($params, [
            'controller_name' => 'AdmissionController',
        ]));
    }

    #[Route('/freshmen', name: 'app_admission_freshmen')]
    public function freshmen(): Response
    {
        $repository = $this->entityManager->getRepository(AdmissionPages::class);
        $page = $repository->findOneBy(['slug' => 'admissions-freshmen']);

        return $this->renderWithDefaults('Admission/freshmen.html.twig', [
            'page' => $page,
        ]);
    }

    #[Route('/transferees', name: 'app_admission_transferees')]
    public function transferees(): Response
    {
        $page = $this->entityManager->getRepository(AdmissionPages::class)->findOneBy(['slug' => 'admissions-transferees']);
        return $this->renderWithDefaults('Admission/transferees.html.twig', [
            'page' => $page,
        ]);
    }

    #[Route('/cross-enrollees', name: 'app_admission_cross_enrollees')]
    public function crossEnrollees(): Response
    {
        $page = $this->entityManager->getRepository(AdmissionPages::class)->findOneBy(['slug' => 'admissions-cross-enrollees']);
        return $this->renderWithDefaults('Admission/cross_enrollees.html.twig', [
            'page' => $page,
        ]);
    }

    #[Route('/second-degree', name: 'app_admission_second_degree')]
    public function secondDegree(): Response
    {
        $page = $this->entityManager->getRepository(AdmissionPages::class)->findOneBy(['slug' => 'admissions-second-degree']);
        return $this->renderWithDefaults('Admission/second_degree.html.twig', [
            'page' => $page,
        ]);
    }

    #[Route('/international-students', name: 'app_admission_international_students')]
    public function internationalStudents(): Response
    {
        $page = $this->entityManager->getRepository(AdmissionPages::class)->findOneBy(['slug' => 'admissions-international-students']);
        return $this->renderWithDefaults('Admission/international_students.html.twig', [
            'page' => $page,
        ]);
    }

    #[Route('/scholarships-grants', name: 'app_admission_scholarships')]
    public function scholarships(): Response
    {
        $page = $this->entityManager->getRepository(AdmissionScholarships::class)->findOneBy([]);
        $scholarships = $this->entityManager->getRepository(ScholarshipItem::class)->findAll();

        return $this->renderWithDefaults('Admission/scholarships.html.twig', [
            'page' => $page,
            'scholarships' => $scholarships,
        ]);
    }

    #[Route('/tuition-fees', name: 'app_admission_tuition_fees')]
    public function tuitionFees(): Response
    {
        $page = $this->entityManager->getRepository(AdmissionTuitionFees::class)->findOneBy([]);
        $paymentOptions = $this->entityManager->getRepository(PaymentOption::class)->findBy(
            ['isActive' => true],
            ['id' => 'ASC']
        );

        return $this->renderWithDefaults('Admission/tuition_fees.html.twig', [
            'page' => $page,
            'paymentOptions' => $paymentOptions,
        ]);
    }

    #[Route('/faqs', name: 'app_admission_faqs')]
    public function faqs(): Response
    {
        $page = $this->entityManager->getRepository(AdmissionFaqs::class)->findOneBy([]);
        $faqs = $this->entityManager->getRepository(FaqItem::class)->findAll();

        return $this->renderWithDefaults('Admission/faqs.html.twig', [
            'page' => $page,
            'faqs' => $faqs,
        ]);
    }
}
