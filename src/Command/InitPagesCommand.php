<?php

namespace App\Command;

use App\Entity\Page;
use App\Entity\PageSection;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:init-pages',
    description: 'Initializes the database with predefined pages for the CMS.',
)]
class InitPagesCommand extends Command
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct();
        $this->entityManager = $entityManager;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $pagesData = [
            // General
            ['module' => 'General', 'slug' => 'home', 'pageName' => 'Home Page'],
            ['module' => 'General', 'slug' => 'privacy-policy', 'pageName' => 'Privacy Policy'],
            ['module' => 'General', 'slug' => 'terms-and-conditions', 'pageName' => 'Terms & Conditions'],

            // Admissions
            ['module' => 'Admissions', 'slug' => 'admissions-freshmen', 'pageName' => 'Freshmen', 'sections' => [
                'Hero Image' => ['text' => null, 'image' => 'Admission_Sample.png'],
                'Hero Title' => ['text' => 'Freshmen'],
                'Procedure Subtitle' => ['text' => 'How to Apply'],
                'Procedure Title' => ['text' => 'Admission Procedures'],
                'Procedure Description' => ['text' => 'Freshmen applicants are those who have completed senior high school, making them eligible to apply for college education.'],
                'Step 1 Title' => ['text' => 'Register'],
                'Step 1 Description' => ['text' => 'Start your journey by registering online through our official link.'],
                'Step 1 Link URL' => ['text' => 'http://bit.ly/FEUCORE'],
                'Step 2 Title' => ['text' => 'Download Forms'],
                'Step 2 Description' => ['text' => 'Complete all necessary application forms for your specific program.'],
                'Step 2 Link URL' => ['text' => 'https://tinyurl.com/FEUTECHFORMS'],
                'Step 3 Title' => ['text' => 'Submit Requirements'],
                'Step 3 Description' => ['text' => 'Send digital copies of your requirements via email for processing.'],
                'Step 3 Email' => ['text' => 'admissions@feutech.edu.ph'],
                'Requirements Subtitle' => ['text' => 'Preparation'],
                'Requirements Title' => ['text' => 'Admission Requirements'],
                'Requirement 1' => ['text' => 'FEUOCAT result'],
                'Requirement 2' => ['text' => 'Admissions form'],
                'Requirement 3' => ['text' => 'SF9 / Grade 12 report card'],
                'Requirement 4' => ['text' => 'Good Moral Certificate'],
                'Requirement 5' => ['text' => 'PSA Birth Certificate'],
                'Enrollment Subtitle' => ['text' => 'Payment Setup'],
                'Enrollment Description' => ['text' => 'Bank accounts for new students who are first time payees.'],
                'Proof Subtitle' => ['text' => 'Proof of Payment'],
                'Proof Description' => ['text' => 'Email the proof of payment to'],
                'Proof Email' => ['text' => 'admissions@feutech.edu.ph'],
                'Enrollment Footer' => ['text' => 'And you are ALL SET! Your credentials will be generated and emailed by the Admissions Office.'],
                'Next Steps Badge' => ['text' => 'What\'s Next?'],
                'Next Steps Title' => ['text' => 'Your Welcome Package'],
                'Next Steps Description' => ['text' => 'Kindly wait for the Admissions Office email regarding the following credentials:'],
                'Credential 1' => ['text' => 'Student Number'],
                'Credential 2' => ['text' => 'Student Portal'],
                'Credential 3' => ['text' => 'MILES Access']
            ]],
            ['module' => 'Admissions', 'slug' => 'admissions-transferees', 'pageName' => 'Transferees'],
            ['module' => 'Admissions', 'slug' => 'admissions-cross-enrollees', 'pageName' => 'Cross Enrollees'],
            ['module' => 'Admissions', 'slug' => 'admissions-second-degree', 'pageName' => 'Second Degree'],
            ['module' => 'Admissions', 'slug' => 'admissions-international-students', 'pageName' => 'International Students'],
            ['module' => 'Admissions', 'slug' => 'admissions-scholarships', 'pageName' => 'Scholarships & Grants'],
            ['module' => 'Admissions', 'slug' => 'admissions-tuition-fees', 'pageName' => 'Tuition Fees'],
            ['module' => 'Admissions', 'slug' => 'admissions-faqs', 'pageName' => 'FAQs'],

            // Student Support
            ['module' => 'Student Support', 'slug' => 'student-journey-gcu', 'pageName' => 'Guidance & Counseling'],
            ['module' => 'Student Support', 'slug' => 'student-journey-sa', 'pageName' => 'Student Affairs'],
            ['module' => 'Student Support', 'slug' => 'student-journey-du', 'pageName' => 'Discipline Unit'],
            ['module' => 'Student Support', 'slug' => 'student-journey-so', 'pageName' => 'Student Organizations'],
            ['module' => 'Student Support', 'slug' => 'student-journey-cesu', 'pageName' => 'Community Extension'],
            ['module' => 'Student Support', 'slug' => 'student-journey-hsu', 'pageName' => 'Health Services'],
            ['module' => 'Student Support', 'slug' => 'student-journey-icare', 'pageName' => 'iCARE'],
            ['module' => 'Student Support', 'slug' => 'student-journey-ialap', 'pageName' => 'iALAP'],
        ];

        $pageRepository = $this->entityManager->getRepository(Page::class);
        $count = 0;

        foreach ($pagesData as $data) {
            $page = $pageRepository->findOneBy(['slug' => $data['slug']]);
            if (!$page) {
                $page = new Page();
                $page->setModule($data['module']);
                $page->setSlug($data['slug']);
                $page->setPageName($data['pageName']);
                
                $this->entityManager->persist($page);
                $count++;
            }

            // Sync sections
            if (isset($data['sections'])) {
                $order = 1;
                foreach ($data['sections'] as $secName => $secData) {
                    $existingSec = $page->getSection($secName);
                    if (!$existingSec) {
                        $newSec = new PageSection();
                        $newSec->setSectionName($secName);
                        $newSec->setTextContent($secData['text'] ?? null);
                        
                        if (isset($secData['image'])) {
                            $newSec->setImagePath($secData['image']);
                        }

                        $newSec->setSortOrder($order);
                        $page->addPageSection($newSec);
                        $this->entityManager->persist($newSec);
                        $count++;
                    }
                    $order++;
                }
            }
        }

        $this->entityManager->flush();

        if ($count > 0) {
            $io->success(sprintf('Successfully initialized %d pages/sections.', $count));
        } else {
            $io->info('Pages and sections are already initialized.');
        }

        return Command::SUCCESS;
    }
}
