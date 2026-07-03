<?php

namespace App\Command;

use App\Entity\Page;
use App\Entity\AdmissionPages;
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
            ['category' => 'General', 'slug' => 'home', 'pageName' => 'Home Page'],
            ['category' => 'General', 'slug' => 'privacy-policy', 'pageName' => 'Privacy Policy'],
            ['category' => 'General', 'slug' => 'terms-and-conditions', 'pageName' => 'Terms & Conditions'],

            // Admissions
            ['category' => 'Admissions', 'slug' => 'admissions-freshmen', 'pageName' => 'Freshmen'],
            ['category' => 'Admissions', 'slug' => 'admissions-transferees', 'pageName' => 'Transferees'],
            ['category' => 'Admissions', 'slug' => 'admissions-cross-enrollees', 'pageName' => 'Cross Enrollees'],
            ['category' => 'Admissions', 'slug' => 'admissions-second-degree', 'pageName' => 'Second Degree'],
            ['category' => 'Admissions', 'slug' => 'admissions-international-students', 'pageName' => 'International Students'],
            ['category' => 'Admissions', 'slug' => 'admissions-scholarships', 'pageName' => 'Scholarships & Grants'],
            ['category' => 'Admissions', 'slug' => 'admissions-tuition-fees', 'pageName' => 'Tuition Fees'],
            ['category' => 'Admissions', 'slug' => 'admissions-faqs', 'pageName' => 'FAQs'],

            // Student Support
            ['category' => 'Student Support', 'slug' => 'student-journey-gcu', 'pageName' => 'Guidance & Counseling'],
            ['category' => 'Student Support', 'slug' => 'student-journey-sa', 'pageName' => 'Student Affairs'],
            ['category' => 'Student Support', 'slug' => 'student-journey-du', 'pageName' => 'Discipline Unit'],
            ['category' => 'Student Support', 'slug' => 'student-journey-so', 'pageName' => 'Student Organizations'],
            ['category' => 'Student Support', 'slug' => 'student-journey-cesu', 'pageName' => 'Community Extension'],
            ['category' => 'Student Support', 'slug' => 'student-journey-hsu', 'pageName' => 'Health Services'],
            ['category' => 'Student Support', 'slug' => 'student-journey-icare', 'pageName' => 'iCARE'],
            ['category' => 'Student Support', 'slug' => 'student-journey-ialap', 'pageName' => 'iALAP'],
        ];

        $pageRepository = $this->entityManager->getRepository(Page::class);
        $count = 0;

        foreach ($pagesData as $data) {
            $page = $pageRepository->findOneBy(['slug' => $data['slug']]);
            if (!$page) {
                $page = new Page();
                $page->setCategory($data['category']);
                $page->setSlug($data['slug']);
                $page->setPageName($data['pageName']);
                
                $this->entityManager->persist($page);
                $count++;
            }
        }

        // Seed AdmissionPages category table content if empty or unpopulated (Only procedure pages)
        $admissionPagesRepo = $this->entityManager->getRepository(AdmissionPages::class);
        
        $admissionsPagesList = [
            'admissions-freshmen' => 'Freshmen',
            'admissions-transferees' => 'Transferees',
            'admissions-cross-enrollees' => 'Cross Enrollees',
            'admissions-second-degree' => 'Second Degree',
            'admissions-international-students' => 'International Students',
        ];

        foreach ($admissionsPagesList as $adSlug => $adName) {
            $adPage = $admissionPagesRepo->findOneBy(['slug' => $adSlug]);
            if (!$adPage) {
                $adPage = new AdmissionPages();
                $adPage->setPageName($adName);
                $adPage->setSlug($adSlug);
                $this->populatePageData($adPage, $adSlug);
                $this->entityManager->persist($adPage);
                $count++;
            } else {
                if (empty($adPage->getHeroTitle())) {
                    $this->populatePageData($adPage, $adSlug);
                    $count++;
                }
            }
        }

        // Seed AdmissionTuitionFees content if empty
        $tuitionRepo = $this->entityManager->getRepository(\App\Entity\AdmissionTuitionFees::class);
        if ($tuitionRepo->count([]) === 0) {
            $tuition = new \App\Entity\AdmissionTuitionFees();
            $tuition->setMetaTitle('Tuition & Fees Payment | FEU Institute of Technology');
            $tuition->setMetaDescription('Convenient and secure payment options for your educational journey at FEU Tech.');
            $tuition->setMetaKeywords('FEU Tech, Tuition Fees, Payment Methods, Bank Transfer, GCash, BPI, BDO');
            
            $tuition->setHeroImage('FEU-TECHBLD.jpg');
            $tuition->setHeroTitle('Tuition & Fees');
            $tuition->setHeroDescription('Convenient and secure payment options for your educational journey.');
            
            $tuition->setBpiImage('Payments/BPI.jpg');
            $tuition->setBdoImage('Payments/BDO.jpg');
            $tuition->setRobinsonsImage('Payments/Robinsons.jpg');
            $tuition->setLandbankImage('Payments/Landbank.jpg');
            $tuition->setGcashImage('Payments/GCash.jpg');
            
            $this->entityManager->persist($tuition);
            $count++;
        }

        // Seed AdmissionScholarships content if empty
        $scholarshipsRepo = $this->entityManager->getRepository(\App\Entity\AdmissionScholarships::class);
        if ($scholarshipsRepo->count([]) === 0) {
            $scholarships = new \App\Entity\AdmissionScholarships();
            $scholarships->setMetaTitle('Scholarships & Grants | FEU Institute of Technology');
            $scholarships->setMetaDescription('Deserving and qualified students who have the desire to continue their education at FEU Tech.');
            $scholarships->setMetaKeywords('FEU Tech, Scholarships, Financial Aid, Grants, Academic Excellence');
            
            $scholarships->setHeroImage('Admission_Sample.png');
            $scholarships->setHeroTitle('Scholarships & Grants');
            $scholarships->setHeroDescription('FEU Institute of Technology, with the support of our academic partners, provides financial assistance to deserving and qualified students who have the desire to continue their education.');
            
            $this->entityManager->persist($scholarships);
            $count++;
        }

        // Seed ScholarshipItem list if empty or incomplete
        $scholarshipItemRepo = $this->entityManager->getRepository(\App\Entity\ScholarshipItem::class);
        if ($scholarshipItemRepo->count([]) < 9) {
            // Clear existing to avoid duplicates
            foreach ($scholarshipItemRepo->findAll() as $item) {
                $this->entityManager->remove($item);
            }
            $this->entityManager->flush();

            // Academic Excellence
            $item1 = new \App\Entity\ScholarshipItem();
            $item1->setTitle("President's Scholarship");
            $item1->setCoverage('Full Scholarship');
            $item1->setCategory('Academic Excellence');
            $item1->setRequirements([
                'SF9/Grade 12 Report Card with a GWA of at least 88%',
                'Certificate of Ranking & Honor',
                'Good Moral Certificate'
            ]);
            $this->entityManager->persist($item1);

            $item2 = new \App\Entity\ScholarshipItem();
            $item2->setTitle('Academic Scholarship');
            $item2->setCoverage('For Existing Enrollees');
            $item2->setCategory('Academic Excellence');
            $item2->setRequirements([
                'Must be an existing or enrolled FEU Tech student.',
                'Must have a TGPA of at least 3.4 and with no individual grades lower than 2.0.',
                'Parents’ Income Tax Return (ITR)'
            ]);
            $this->entityManager->persist($item2);

            $item3 = new \App\Entity\ScholarshipItem();
            $item3->setTitle('Elite Academic Scholarship');
            $item3->setCoverage('Science High School Graduates');
            $item3->setCategory('Academic Excellence');
            $item3->setRequirements([
                'Graduate of any science senior high schools.',
                'Must maintain a CGPA of 2.5 or higher.',
                'Parent’s ITR (Combined annual income ≤ P300,000.00)'
            ]);
            $this->entityManager->persist($item3);

            // Industry Partners
            $item4 = new \App\Entity\ScholarshipItem();
            $item4->setTitle('FEU Tech/SM Foundation');
            $item4->setCoverage('SM Partner Grant');
            $item4->setCategory('Industry Partners');
            $item4->setRequirements([
                '85% weighted avg during Grade 12',
                '80% grade in Math and Science',
                'Public school graduate (Manila, Cavite, Cebu, Iloilo)',
                'Parent’s ITR (Income ≤ P100k)'
            ]);
            $this->entityManager->persist($item4);

            $item5 = new \App\Entity\ScholarshipItem();
            $item5->setTitle('FEU Tech/Megaworld');
            $item5->setCoverage('Megaworld Partner Grant');
            $item5->setCategory('Industry Partners');
            $item5->setRequirements([
                'SHS final avg of 85% or equivalent',
                'No grade below 80%',
                'Upper 10% of graduating batch',
                'Parent’s ITR (Income ≤ P300k)'
            ]);
            $this->entityManager->persist($item5);

            $item6 = new \App\Entity\ScholarshipItem();
            $item6->setTitle('LSEG Academe Linkage');
            $item6->setCoverage('LSEG Partner Grant');
            $item6->setCategory('Industry Partners');
            $item6->setRequirements([
                'Enrolled FEU Tech student',
                'No failing grade in any subject',
                'Recommendation letter from Dean/Chair',
                'Willing to work at LSEG post-graduation'
            ]);
            $this->entityManager->persist($item6);

            // Other Grants
            $item7 = new \App\Entity\ScholarshipItem();
            $item7->setTitle('Financial Assistance');
            $item7->setCoverage('Support for NCR Graduates');
            $item7->setCategory('Other Grants');
            $item7->setRequirements([
                'HS graduate of any school from NCR',
                'Parent’s ITR (Combined annual income ≤ P300k)',
                'Avg grade 88%+ in Math, Science, English, GWA 88%+',
                'All other subjects 80% or above in 4th year'
            ]);
            $this->entityManager->persist($item7);

            $item8 = new \App\Entity\ScholarshipItem();
            $item8->setTitle('Transferee Scholarship');
            $item8->setCoverage('One-Term Grant');
            $item8->setCategory('Other Grants');
            $item8->setRequirements([
                'Completed units in preceding term: Semester (18), Trimester (15), Quadmester (12)',
                'Parent’s ITR (Combined annual income ≤ P300k)',
                'Must apply for Academic Scholarship for subsequent terms'
            ]);
            $this->entityManager->persist($item8);

            $item9 = new \App\Entity\ScholarshipItem();
            $item9->setTitle('Cultural Group');
            $item9->setCoverage('Artistic Talents');
            $item9->setCategory('Other Grants');
            $item9->setRequirements([
                'Must pass auditions certified by Artistic Director',
                'Maintain TGPA of 2.5 or better with no failing marks',
                'Parent’s ITR (Combined annual income ≤ P300k)'
            ]);
            $this->entityManager->persist($item9);

            $count += 9;
        }

        // Seed AdmissionFaqs content if empty
        $faqsRepo = $this->entityManager->getRepository(\App\Entity\AdmissionFaqs::class);
        if ($faqsRepo->count([]) === 0) {
            $faqs = new \App\Entity\AdmissionFaqs();
            $faqs->setMetaTitle('Frequently Asked Questions | FEU Institute of Technology');
            $faqs->setMetaDescription('Find quick answers to your questions about enrollment, tuition, and academics.');
            $faqs->setMetaKeywords('FEU Tech, FAQs, College Questions');
            
            $faqs->setHeroTitle('Frequently Asked Questions');
            $faqs->setHeroDescription('Find quick answers to your questions about enrollment, tuition, and academics.');
            
            $this->entityManager->persist($faqs);
            $count++;
        }

        // Seed FaqItem list if empty
        $faqItemRepo = $this->entityManager->getRepository(\App\Entity\FaqItem::class);
        if ($faqItemRepo->count([]) === 0) {
            $faq1 = new \App\Entity\FaqItem();
            $faq1->setQuestion('What are the options for mode of learning?');
            $faq1->setAnswer('We offer Blended Learning (combination of onsite and online classes) and fully virtual options depending on the course.');
            $faq1->setCategory('academics');
            $this->entityManager->persist($faq1);

            $faq2 = new \App\Entity\FaqItem();
            $faq2->setQuestion('Do you accept transferees?');
            $faq2->setAnswer('Yes, we accept transferees. Please refer to our Transferee Admissions page for detailed instructions and credit evaluation procedures.');
            $faq2->setCategory('admissions');
            $this->entityManager->persist($faq2);

            $count += 2;
        }

        // Clean up obsolete rows from AdmissionPages (scholarships, tuition-fees, faqs)
        $obsoleteSlugs = ['admissions-scholarships', 'admissions-tuition-fees', 'admissions-faqs'];
        foreach ($obsoleteSlugs as $obsSlug) {
            $obsPage = $admissionPagesRepo->findOneBy(['slug' => $obsSlug]);
            if ($obsPage) {
                $this->entityManager->remove($obsPage);
            }
        }

        // Seed AdmissionFaqs default hero background image if not set
        $faqs = $faqsRepo->findOneBy([]);
        if ($faqs && empty($faqs->getHeroImage())) {
            $faqs->setHeroImage('pattern.svg');
            $this->entityManager->persist($faqs);
        }

        // Seed PaymentOption & PaymentStep if empty
        $paymentOptionRepo = $this->entityManager->getRepository(\App\Entity\PaymentOption::class);
        if ($paymentOptionRepo->count([]) === 0) {
            // 1. BPI
            $bpi = new \App\Entity\PaymentOption();
            $bpi->setName('BPI Bills Payment');
            $bpi->setSlug('bpi');
            $bpi->setLogoText('BPI');
            $bpi->setThemeColor('#b11116');
            $bpi->setMerchantName('FEU Institute of Technology');
            $bpi->setInstructionsImage('BPI.jpg');
            $bpi->setImportantReminders([
                'For Tuition Fee Payments: No need to send proof of payments.',
                'For Payments other than tuition fee: Please send your proof of payments via Google Forms. Indicate purpose of payment.'
            ]);
            $bpi->setIsActive(true);
            $this->entityManager->persist($bpi);

            // 2. BDO
            $bdo = new \App\Entity\PaymentOption();
            $bdo->setName('BDO Bills Payment');
            $bdo->setSlug('bdo');
            $bdo->setLogoText('BDO');
            $bdo->setThemeColor('#0038A8');
            $bdo->setMerchantName('FEU Institute of Technology');
            $bdo->setInstructionsImage('BDO.jpg');
            $bdo->setImportantReminders([
                'For Tuition Fee Payments: No need to send proof of payments.',
                'For Payments other than tuition fee: Please send your proof of payments via Google Forms. Indicate purpose of payment.'
            ]);
            $bdo->setIsActive(true);
            $this->entityManager->persist($bdo);

            // 3. Robinsons Bank
            $rob = new \App\Entity\PaymentOption();
            $rob->setName('Robinsons Bank');
            $rob->setSlug('robinsons');
            $rob->setLogoText('RB');
            $rob->setThemeColor('#F21A22');
            $rob->setMerchantName('FEU Institute of Technology');
            $rob->setInstructionsImage('RobinsonsBank.jpg');
            $rob->setImportantReminders([
                'For Tuition Fee Payments: No need to send proof of payments.',
                'For Payments other than tuition fee: Please send your proof of payments via Google Forms. Indicate purpose of payment.'
            ]);
            $rob->setIsActive(true);
            $this->entityManager->persist($rob);

            // 4. Land Bank
            $lb = new \App\Entity\PaymentOption();
            $lb->setName('Land Bank');
            $lb->setSlug('landbank');
            $lb->setLogoText('LBP');
            $lb->setThemeColor('#007A33');
            $lb->setMerchantName('FEU INSTITUTE OF TECHNOLOGY');
            $lb->setAdditionalInfo('Access the Portal: <a href="https://tinyurl.com/LBPLinkBiz" target="_blank" class="text-xl text-[#007A33] font-bold hover:underline break-all">https://tinyurl.com/LBPLinkBiz</a>');
            $lb->setIsActive(true);
            $this->entityManager->persist($lb);

            // Landbank steps
            $lbSteps = [
                [
                    'num' => 1,
                    'title' => 'Select Biller',
                    'desc' => 'Select <strong>FEU INSTITUTE OF TECHNOLOGY</strong>',
                    'img' => 'Landbank1.png'
                ],
                [
                    'num' => 2,
                    'title' => 'Select Transaction',
                    'desc' => 'Select <strong>TUITION FEE</strong> in the transaction type.',
                    'img' => 'Landbank2.png'
                ],
                [
                    'num' => 3,
                    'title' => 'Fill out form',
                    'desc' => 'Fill out the form with your correct Student Details.',
                    'img' => 'Landbank3.png'
                ],
                [
                    'num' => 4,
                    'title' => 'Select Payment Option',
                    'desc' => 'Select your preferred payment options (e.g. Landbank, Cash Payment, GCash, etc.).',
                    'img' => 'Landbank5.png'
                ],
                [
                    'num' => 5,
                    'title' => 'Submit Payment',
                    'desc' => 'Agree to Terms & Conditions, enter your email and hit submit.',
                    'img' => 'Landbank6.png'
                ],
                [
                    'num' => 6,
                    'title' => 'Finalize Payment',
                    'desc' => 'For online bank payment, check your account for confirmation. For over-the-counter payment, take note of the payment deadline and reference number and follow further payment instructions.',
                    'img' => 'Landbank7.png,Landbank8-1.png'
                ]
            ];

            foreach ($lbSteps as $sData) {
                $step = new \App\Entity\PaymentStep();
                $step->setStepNumber($sData['num']);
                $step->setTitle($sData['title']);
                $step->setDescription($sData['desc']);
                $step->setImage($sData['img']);
                $step->setPaymentOption($lb);
                $this->entityManager->persist($step);
            }

            // 5. GCash
            $gc = new \App\Entity\PaymentOption();
            $gc->setName('GCash');
            $gc->setSlug('gcash');
            $gc->setLogoText('G');
            $gc->setThemeColor('#007DFE');
            $gc->setShowComputation(true);
            $gc->setComputationFee('5,000.00');
            $gc->setComputationDivisor('0.985');
            $gc->setComputationTotal('5,076.15');
            $gc->setComputationProcessingFee('76.15');
            $gc->setIsActive(true);
            $this->entityManager->persist($gc);

            // GCash steps
            $gcSteps = [
                [
                    'num' => 1,
                    'title' => 'Open GCash App',
                    'desc' => 'Open the GCash app and tap <strong>“Bills”</strong>.',
                    'img' => 'Gcash1.png'
                ],
                [
                    'num' => 2,
                    'title' => 'Select Schools',
                    'desc' => 'Under Categories, tap <strong>“Biller Categories”</strong> and select <strong>“Schools”</strong>.',
                    'img' => 'Gcash2.png'
                ],
                [
                    'num' => 3,
                    'title' => 'Search FEU Tech',
                    'desc' => 'Search for and select <strong>“FEU Institute of Technology”</strong>.',
                    'img' => 'Gcash3.png'
                ],
                [
                    'num' => 4,
                    'title' => 'Fill-out Information',
                    'desc' => 'Fill out all the required information including ID Number, Student Name, and Email Address.',
                    'img' => 'Gcash4.png,Gcash5.png'
                ],
                [
                    'num' => 5,
                    'title' => 'Confirm & Wait',
                    'desc' => 'Click <strong>“Confirm”</strong> and wait for the transaction receipt.',
                    'img' => 'Gcash6.png'
                ]
            ];

            foreach ($gcSteps as $sData) {
                $step = new \App\Entity\PaymentStep();
                $step->setStepNumber($sData['num']);
                $step->setTitle($sData['title']);
                $step->setDescription($sData['desc']);
                $step->setImage($sData['img']);
                $step->setPaymentOption($gc);
                $this->entityManager->persist($step);
            }

            $count += 5;
        }

        $this->entityManager->flush();

        if ($count > 0) {
            $io->success(sprintf('Successfully initialized %d pages/contents.', $count));
        } else {
            $io->info('Pages and contents are already initialized.');
        }

        return Command::SUCCESS;
    }

    private function populatePageData(AdmissionPages $adPage, string $adSlug): void
    {
        // Common defaults
        $adPage->setProcedureSubtitle('How to Apply');
        $adPage->setProcedureTitle('Admission Procedures');
        $adPage->setEnrollmentSubtitle('Payment Setup');
        $adPage->setEnrollmentDescription('Bank accounts for new students who are first time payees.');
        $adPage->setProofSubtitle('Proof of Payment');
        $adPage->setProofDescription('Email the proof of payment to');
        $adPage->setProofEmail('admissions@feutech.edu.ph');
        $adPage->setEnrollmentFooter('And you are ALL SET! Your credentials will be generated and emailed by the Admissions Office.');
        $adPage->setNextStepsBadge("What's Next?");
        $adPage->setNextStepsTitle('Your Welcome Package');
        $adPage->setNextStepsDescription('Kindly wait for the Admissions Office email regarding the following credentials:');
        $adPage->setCredential1('Student Number');
        $adPage->setCredential2('Student Portal');
        $adPage->setCredential3('MILES Access');
        $adPage->setHeroImage('Admission_Sample.png');

        if ($adSlug === 'admissions-freshmen') {
            $adPage->setMetaTitle('Freshmen Admissions | FEU Institute of Technology');
            $adPage->setMetaDescription('Freshmen applicants are those who have completed senior high school, making them eligible to apply for college education.');
            $adPage->setMetaKeywords('FEU Tech, Freshmen Admissions, College Application');
            $adPage->setHeroTitle('Freshmen');
            $adPage->setProcedureDescription('Freshmen applicants are those who have completed senior high school, making them eligible to apply for college education.');
            
            $adPage->setStep1Title('Register');
            $adPage->setStep1Description('Start your journey by registering online through our official link.');
            $adPage->setStep1LinkUrl('http://bit.ly/FEUCORE');
            $adPage->setStep2Title('Download Forms');
            $adPage->setStep2Description('Complete all necessary application forms for your specific program.');
            $adPage->setStep2LinkUrl('https://tinyurl.com/FEUTECHFORMS');
            $adPage->setStep3Title('Submit Requirements');
            $adPage->setStep3Description('Send digital copies of your requirements via email for processing.');
            $adPage->setStep3Email('admissions@feutech.edu.ph');
            
            $adPage->setRequirementsSubtitle('Preparation');
            $adPage->setRequirementsTitle('Admission Requirements');
            $adPage->setRequirement1('FEUOCAT result');
            $adPage->setRequirement2('Admissions form');
            $adPage->setRequirement3('SF9 / Grade 12 report card');
            $adPage->setRequirement4('Good Moral Certificate');
            $adPage->setRequirement5('PSA Birth Certificate');
        } elseif ($adSlug === 'admissions-transferees') {
            $adPage->setMetaTitle('Transferee Admissions | FEU Institute of Technology');
            $adPage->setMetaDescription('Transferees are students who have enrolled or taken college or vocational units in other institutions.');
            $adPage->setMetaKeywords('FEU Tech, Transferee Admissions, Credit Evaluation');
            $adPage->setHeroTitle('Transferees');
            $adPage->setProcedureDescription('Transferees are students who have enrolled or taken college or vocational units in other colleges, universities or vocational schools.');
            
            $adPage->setStep1Title('Register');
            $adPage->setStep1Description('Start your journey by registering online through our official link.');
            $adPage->setStep1LinkUrl('http://bit.ly/FEUCORE');
            $adPage->setStep2Title('Crediting');
            $adPage->setStep2Description('Submit TOR and Course Description for subject evaluation.');
            $adPage->setStep2LinkUrl('admissions@feutech.edu.ph');
            $adPage->setStep3Title('Pay Fee');
            $adPage->setStep3Description('Pay reservation fee via our accredited bank partners.');
            $adPage->setStep3Email('reservations@feutech.edu.ph');
            $adPage->setStep4Title('Get Ready');
            $adPage->setStep4Description('Complete admissions forms and wait for your portal access.');
            $adPage->setStep4LinkUrl('https://tinyurl.com/FEUTECHFORMS');
            
            $adPage->setRequirementsSubtitle('Preparation');
            $adPage->setRequirementsTitle('Admission Requirements');
            $adPage->setRequirement1('FEUOCAT result');
            $adPage->setRequirement2('Admissions form');
            $adPage->setRequirement3('Transcript of Records');
            $adPage->setRequirement4('Course Description');
            $adPage->setRequirement5('Good Moral Certificate');
            $adPage->setRequirement6('Honorable Dismissal');
            $adPage->setRequirement7('PSA Birth Certificate');
        } elseif ($adSlug === 'admissions-cross-enrollees') {
            $adPage->setMetaTitle('Cross Enrollee Admissions | FEU Institute of Technology');
            $adPage->setMetaDescription('Cross enrollees are students currently enrolled in other schools who wish to take specific courses at FEU Tech.');
            $adPage->setMetaKeywords('FEU Tech, Cross Enrollees, Substitute Subject');
            $adPage->setHeroTitle('Cross Enrollees');
            $adPage->setProcedureDescription('Cross enrollees are students currently enrolled in another institution who wish to take courses/subjects in FEU Tech.');
            
            $adPage->setStep1Title('Permit');
            $adPage->setStep1Description('Secure a cross-enrollment permit from your home school\'s registrar.');
            $adPage->setStep1LinkUrl('admissions@feutech.edu.ph');
            $adPage->setStep2Title('Register');
            $adPage->setStep2Description('Register online through the student portal link.');
            $adPage->setStep2LinkUrl('http://bit.ly/FEUCORE');
            $adPage->setStep3Title('Pay Fee');
            $adPage->setStep3Description('Pay reservation fee via our accredited bank partners.');
            $adPage->setStep3Email('reservations@feutech.edu.ph');
            
            $adPage->setRequirementsSubtitle('Preparation');
            $adPage->setRequirementsTitle('Admission Requirements');
            $adPage->setRequirement1('Cross-enrollment permit from home school');
            $adPage->setRequirement2('Admissions form');
            $adPage->setRequirement3('PSA Birth Certificate');
        } elseif ($adSlug === 'admissions-second-degree') {
            $adPage->setMetaTitle('Second Degree Admissions | FEU Institute of Technology');
            $adPage->setMetaDescription('Second degree applicants are college graduates who wish to pursue a second undergraduate degree.');
            $adPage->setMetaKeywords('FEU Tech, Second Degree, Graduate Engineering');
            $adPage->setHeroTitle('Second Degree');
            $adPage->setProcedureDescription('Second degree applicants are those college graduates who wish to pursue another undergraduate program in FEU Tech.');
            
            $adPage->setStep1Title('Register');
            $adPage->setStep1Description('Register online through our official student portal.');
            $adPage->setStep1LinkUrl('http://bit.ly/FEUCORE');
            $adPage->setStep2Title('Evaluation');
            $adPage->setStep2Description('Submit TOR and Course Description for credit evaluation.');
            $adPage->setStep2LinkUrl('admissions@feutech.edu.ph');
            $adPage->setStep3Title('Pay Fee');
            $adPage->setStep3Description('Pay reservation fee via our accredited bank partners.');
            $adPage->setStep3Email('reservations@feutech.edu.ph');
            $adPage->setStep4Title('Get Ready');
            $adPage->setStep4Description('Complete admissions forms and wait for your portal access.');
            $adPage->setStep4LinkUrl('https://tinyurl.com/FEUTECHFORMS');
            
            $adPage->setRequirementsSubtitle('Preparation');
            $adPage->setRequirementsTitle('Admission Requirements');
            $adPage->setRequirement1('Admissions form');
            $adPage->setRequirement2('Transcript of Records (TOR)');
            $adPage->setRequirement3('Honorable Dismissal / Transfer Credentials');
            $adPage->setRequirement4('PSA Birth Certificate');
            $adPage->setRequirement5('Good Moral Certificate');
        } elseif ($adSlug === 'admissions-international-students') {
            $adPage->setMetaTitle('International Student Admissions | FEU Institute of Technology');
            $adPage->setMetaDescription('FEU Tech welcomes international student applicants looking for global-standard education.');
            $adPage->setMetaKeywords('FEU Tech, International Students, Student Visa');
            $adPage->setHeroTitle('International Students');
            $adPage->setProcedureDescription('FEU Tech welcomes students from other countries who are looking to pursue high-quality engineering and IT education in the Philippines.');
            
            $adPage->setStep1Title('Register and Submit');
            $adPage->setStep1Description('Register online via student portal and submit requirements.');
            $adPage->setStep1LinkUrl('http://bit.ly/FEUCORE');
            $adPage->setStep2Title('Submit and Enroll');
            $adPage->setStep2Description('Submit visa documents and wait for official acceptance.');
            $adPage->setStep2LinkUrl('admissions@feutech.edu.ph');
            
            $adPage->setRequirementsSubtitle('Preparation');
            $adPage->setRequirementsTitle('Admission Requirements');
            $adPage->setRequirement1('Academic Documents (TOR/Diploma)');
            $adPage->setRequirement2('Copy of Passport Bio-page');
            $adPage->setRequirement3('Transcript of Records (English translation)');
            $adPage->setRequirement4('Certificate of Graduation');
            $adPage->setRequirement5('Good Moral Certificate');
        }
    }
}
