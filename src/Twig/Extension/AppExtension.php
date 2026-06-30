<?php

namespace App\Twig\Extension;

use App\Entity\Page;
use App\Entity\SiteSettings;
use App\Entity\AdmissionPages;
use App\Entity\AdmissionTuitionFees;
use App\Entity\AdmissionScholarships;
use App\Entity\AdmissionFaqs;
use Doctrine\ORM\EntityManagerInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use Symfony\Component\HttpFoundation\RequestStack;

class AppExtension extends AbstractExtension
{
    private EntityManagerInterface $entityManager;
    private RequestStack $requestStack;

    public function __construct(EntityManagerInterface $entityManager, RequestStack $requestStack)
    {
        $this->entityManager = $entityManager;
        $this->requestStack = $requestStack;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('get_current_page_meta', [$this, 'getCurrentPageMeta']),
            new TwigFunction('get_site_settings', [$this, 'getSiteSettings']),
        ];
    }

    public function getCurrentPageMeta(): ?Page
    {
        $request = $this->requestStack->getCurrentRequest();
        if (!$request) {
            return null;
        }

        $route = $request->attributes->get('_route');
        $path = $request->getPathInfo();

        // Map Symfony route names to database slugs
        $routeMap = [
            'app_home' => 'home',
            'app_privacy_policy' => 'privacy-policy',
            'app_terms_and_conditions' => 'terms-and-conditions',
            'app_admission_freshmen' => 'admissions-freshmen',
            'app_admission_transferees' => 'admissions-transferees',
            'app_admission_cross_enrollees' => 'admissions-cross-enrollees',
            'app_admission_second_degree' => 'admissions-second-degree',
            'app_admission_international_students' => 'admissions-international-students',
            'app_admission_scholarships' => 'admissions-scholarships',
            'app_admission_tuition_fees' => 'admissions-tuition-fees',
            'app_admission_faqs' => 'admissions-faqs',
            'app_student_journey_gcu' => 'student-journey-gcu',
            'app_student_journey_sa' => 'student-journey-sa',
            'app_student_journey_du' => 'student-journey-du',
            'app_student_journey_so' => 'student-journey-so',
            'app_student_journey_cesu' => 'student-journey-cesu',
            'app_student_journey_hsu' => 'student-journey-hsu',
            'app_student_journey_icare' => 'student-journey-icare',
            'app_student_journey_ialap' => 'student-journey-ialap',
        ];

        $slug = null;
        if ($route && isset($routeMap[$route])) {
            $slug = $routeMap[$route];
        } else {
            // Fallback: trim leading slash
            $slug = ltrim($path, '/');
            if ($slug === '') {
                $slug = 'home';
            }
        }

        $page = $this->entityManager->getRepository(Page::class)->findOneBy(['slug' => $slug]);

        // Admissions category loading logic: load metadata from respective entities
        if (str_starts_with($slug, 'admissions-')) {
            if (!$page) {
                $page = new Page();
                $page->setSlug($slug);
                $page->setPageName(ucfirst(str_replace('admissions-', '', $slug)));
                $page->setCategory('Admissions');
            }

            if ($slug === 'admissions-tuition-fees') {
                $tuition = $this->entityManager->getRepository(AdmissionTuitionFees::class)->findOneBy([]);
                if ($tuition) {
                    $page->setMetaTitle($tuition->getMetaTitle());
                    $page->setMetaDescription($tuition->getMetaDescription());
                    $page->setMetaKeywords($tuition->getMetaKeywords());
                }
            } elseif ($slug === 'admissions-scholarships') {
                $scholarships = $this->entityManager->getRepository(AdmissionScholarships::class)->findOneBy([]);
                if ($scholarships) {
                    $page->setMetaTitle($scholarships->getMetaTitle());
                    $page->setMetaDescription($scholarships->getMetaDescription());
                    $page->setMetaKeywords($scholarships->getMetaKeywords());
                }
            } elseif ($slug === 'admissions-faqs') {
                $faqs = $this->entityManager->getRepository(AdmissionFaqs::class)->findOneBy([]);
                if ($faqs) {
                    $page->setMetaTitle($faqs->getMetaTitle());
                    $page->setMetaDescription($faqs->getMetaDescription());
                    $page->setMetaKeywords($faqs->getMetaKeywords());
                }
            } else {
                $admissionPage = $this->entityManager->getRepository(AdmissionPages::class)->findOneBy(['slug' => $slug]);
                if ($admissionPage) {
                    if ($admissionPage->getMetaTitle()) {
                        $page->setMetaTitle($admissionPage->getMetaTitle());
                    }
                    if ($admissionPage->getMetaDescription()) {
                        $page->setMetaDescription($admissionPage->getMetaDescription());
                    }
                    if ($admissionPage->getMetaKeywords()) {
                        $page->setMetaKeywords($admissionPage->getMetaKeywords());
                    }
                }
            }
        }

        return $page;
    }

    public function getSiteSettings(): ?SiteSettings
    {
        $settings = $this->entityManager->getRepository(SiteSettings::class)->findAll();
        
        if (count($settings) > 0) {
            return $settings[0];
        }

        // Fallback: instantiate in-memory default settings if DB is empty
        $defaultSettings = new SiteSettings();
        $defaultSettings->setCookieBannerEnabled(true);
        $defaultSettings->setCookieButtonText('Accept');
        $defaultSettings->setCookieMessage('We use cookies to make websites work efficiently, as well as to provide information to the owners of the website.');
        
        return $defaultSettings;
    }
}
