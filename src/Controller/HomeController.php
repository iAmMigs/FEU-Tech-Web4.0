<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\GeneralPages;
use App\Entity\MagazineItem;
use App\Entity\TambayanVideo;
use App\Entity\HomeEvent;
use Symfony\Component\HttpKernel\KernelInterface;

final class HomeController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    private function renderWithDefaults(string $view, array $params = []): Response
    {
        return $this->render('user/' . ltrim($view, '/'), array_merge($params, [
            'controller_name' => 'HomeController',
        ]));
    }

    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        // Ensure the initial data is seeded
        $this->ensureInitialData($this->entityManager);

        // Fetch dynamic general pages content
        $page = $this->entityManager->getRepository(GeneralPages::class)->findOneBy(['slug' => 'home']);
        $magazines = $this->entityManager->getRepository(MagazineItem::class)->findBy([], ['sortOrder' => 'ASC']);
        $videos = $this->entityManager->getRepository(TambayanVideo::class)->findBy([], ['sortOrder' => 'ASC']);
        $events = $this->entityManager->getRepository(HomeEvent::class)->findBy([], ['sortOrder' => 'ASC']);

        return $this->renderWithDefaults('home/index.html.twig', [
            'page' => $page,
            'magazines' => $magazines,
            'videos' => $videos,
            'events' => $events,
        ]);
    }

    #[Route('/dev/schema-update', name: 'dev_schema_update')]
    public function schemaUpdate(KernelInterface $kernel): Response
    {
        $application = new \Symfony\Bundle\FrameworkBundle\Console\Application($kernel);
        $application->setAutoExit(false);
        $input = new \Symfony\Component\Console\Input\ArrayInput([
            'command' => 'doctrine:schema:update',
            '--force' => true,
        ]);
        $output = new \Symfony\Component\Console\Output\BufferedOutput();
        $application->run($input, $output);
        return new Response('<pre>' . $output->fetch() . '</pre>');
    }

    private function copyAsset(string $relativeSource, string $relativeDest): void
    {
        $projectDir = dirname(__DIR__, 2);
        $sourcePath = $projectDir . '/public/' . ltrim($relativeSource, '/');
        $destPath = $projectDir . '/public/' . ltrim($relativeDest, '/');
        
        $destDir = dirname($destPath);
        if (!is_dir($destDir)) {
            mkdir($destDir, 0777, true);
        }
        
        if (file_exists($sourcePath) && !file_exists($destPath)) {
            copy($sourcePath, $destPath);
        }
    }

    private function ensureInitialData(EntityManagerInterface $em): void
    {
        $repo = $em->getRepository(GeneralPages::class);
        $home = $repo->findOneBy(['slug' => 'home']);
        
        // Update in-place if it starts with static paths to preserve ID = 1
        if ($home && str_starts_with($home->getHeroVideoPath() ?? '', '/videos/')) {
            $this->copyAsset('videos/SAMPLEHERO2.mp4', 'uploads/general/SAMPLEHERO2.mp4');
            $home->setHeroVideoPath('uploads/general/SAMPLEHERO2.mp4');

            $this->copyAsset('images/FEU-TECHBLD.jpg', 'uploads/general/FEU-TECHBLD.jpg');
            $home->setCoursesBgImage('uploads/general/FEU-TECHBLD.jpg');
            $em->persist($home);
            $em->flush();
        }

        $magRepo = $em->getRepository(MagazineItem::class);
        $firstMag = $magRepo->findOneBy([]);
        if ($firstMag && str_starts_with($firstMag->getImagePath() ?? '', '/images/')) {
            foreach ($magRepo->findAll() as $m) {
                $em->remove($m);
            }
            $em->flush();
        }

        $eventRepo = $em->getRepository(HomeEvent::class);
        $firstEvt = $eventRepo->findOneBy([]);
        if ($firstEvt && str_starts_with($firstEvt->getImagePath() ?? '', '/images/')) {
            foreach ($eventRepo->findAll() as $e) {
                $em->remove($e);
            }
            $em->flush();
        }

        if (!$home) {
            $home = new GeneralPages();
            $home->setPageName('Home');
            $home->setSlug('home');
            $home->setMetaTitle('School of Innovation | FEU Institute of Technology');
            $home->setMetaDescription('FEU Tech is an AI Campus and an internationally ranked institution recognized for global excellence in Engineering, Computer Science, I.T., Multimedia Arts and Research. It is committed to producing graduates who are industry-ready and globally competitive from day one.');
            $home->setMetaKeywords('FEU Tech, School of Innovation, Engineering, Computer Science, Information Technology, Multimedia Arts, AI Campus');
            
            $this->copyAsset('videos/SAMPLEHERO2.mp4', 'uploads/general/SAMPLEHERO2.mp4');
            $home->setHeroVideoPath('uploads/general/SAMPLEHERO2.mp4');
            $home->setHeroTagline('Welcome to The School of Innovation');
            $home->setHeroTitle('Shape Your Future at FEU Tech');
            $home->setHeroDescription('FEU Tech is an AI Campus and an internationally ranked institution recognized for global excellence in Engineering, Computer Science, I.T., Multimedia Arts and Research. It is committed to producing graduates who are industry-ready and globally competitive from day one.');
            $home->setHeroBtn1Text('CCSMA');
            $home->setHeroBtn1Url('/academics/ccsma');
            $home->setHeroBtn2Text('Apply Now');
            $home->setHeroBtn2Url('/freshmen');
            $home->setHeroBtn3Text('COE');
            $home->setHeroBtn3Url('/academics/coe');
            
            $this->copyAsset('images/FEU-TECHBLD.jpg', 'uploads/general/FEU-TECHBLD.jpg');
            $home->setCoursesBgImage('uploads/general/FEU-TECHBLD.jpg');
            $home->setCoeCardTitle('College of Engineering');
            $home->setCoeCardDescription('Build the future with fully-accredited civil, electronics, mechanical, and computer engineering programs. Take the first step towards a successful career.');
            $home->setCoeCardBtnText('Apply Now!');
            $home->setCoeCardBtnUrl('/academics/coe');
            
            $home->setCcsmaCardTitle('College of Computer Studies & Multimedia Arts');
            $home->setCcsmaCardDescription('Dive deep into software engineering, artificial intelligence, and premier creative multimedia programs. Lead the digital revolution.');
            $home->setCcsmaCardBtnText('Apply Now!');
            $home->setCcsmaCardBtnUrl('/academics/ccsma');
            
            $home->setAccordion1Title('About FEU Tech Experience');
            $home->setAccordion1Content('At FEU Tech, we\'re more than a school — we\'re a launchpad for your future. We push boundaries and shape industry leaders through fully-accredited engineering, computer science, and multimedia programs. Here, you don\'t just learn — you build, innovate, and lead.');
            $home->setAccordion2Title('Campus Life');
            $home->setAccordion2Content('Lorem ipsum');
            $home->setAccordion3Title('Student Organizations');
            $home->setAccordion3Content('Lorem ipsum');
            $home->setAccordion4Title('Regular Events');
            $home->setAccordion4Content('Lorem ipsum');
            
            $em->persist($home);
            $em->flush();
        }

        // Enforce ID = 1 for the home page so the EasyAdmin edit URL (/1/edit) remains valid
        $em->getConnection()->executeStatement("UPDATE general_pages SET id = 1 WHERE slug = 'home'");

        // Seed magazines if empty
        if (count($magRepo->findAll()) === 0) {
            $magazines = [
                [
                    'img' => '/images/magazine/issue1.png',
                    'dest' => 'uploads/magazines/issue1.png',
                    'link' => 'https://drive.google.com/file/d/1Nvc5Qvx9kIQOijV6fzbx6O6VC1t5M4LD/view'
                ],
                [
                    'img' => '/images/magazine/issue3.png',
                    'dest' => 'uploads/magazines/issue3.png',
                    'link' => 'https://heyzine.com/flip-book/fd6d3a5475.html#page/1'
                ],
                [
                    'img' => '/images/magazine/issue2.png',
                    'dest' => 'uploads/magazines/issue2.png',
                    'link' => 'https://drive.google.com/file/d/1rpQ8TCiGqPfzIsufRCltl_Y39OavyN9T/view'
                ],
                [
                    'img' => '/images/magazine/issue5.png',
                    'dest' => 'uploads/magazines/issue5.png',
                    'link' => 'https://heyzine.com/flip-book/574ef6415d.html'
                ]
            ];
            foreach ($magazines as $index => $mag) {
                $this->copyAsset($mag['img'], $mag['dest']);
                $item = new MagazineItem();
                $item->setImagePath($mag['dest']);
                $item->setLinkUrl($mag['link']);
                $item->setSortOrder($index + 1);
                $em->persist($item);
            }
        }

        // Seed videos if empty
        $videoRepo = $em->getRepository(TambayanVideo::class);
        if (count($videoRepo->findAll()) === 0) {
            $videos = [
                [
                    'id' => 'd0a2jThLgx4',
                    'title' => 'MILES PARAVERSE',
                    'link' => 'https://www.youtube.com/watch?v=d0a2jThLgx4'
                ],
                [
                    'id' => 'n_LEKwGma6g',
                    'title' => 'EXPLORE THE FEU TECH CAMPUS!',
                    'link' => 'https://www.youtube.com/watch?v=n_LEKwGma6g&source_ve_path=MTc4NDI0'
                ],
                [
                    'id' => 'N36B85B5xC8',
                    'title' => '"Hall of Greats" Music Video',
                    'link' => 'https://www.youtube.com/watch?v=N36B85B5xC8'
                ],
                [
                    'id' => 'ewMDmlMNboE',
                    'title' => '3 Easy Steps for Freshmen Enrollment at FEU Tech',
                    'link' => 'https://www.youtube.com/watch?v=ewMDmlMNboE'
                ]
            ];
            foreach ($videos as $index => $vid) {
                $item = new TambayanVideo();
                $item->setYoutubeId($vid['id']);
                $item->setTitle($vid['title']);
                $item->setLinkUrl($vid['link']);
                $item->setSortOrder($index + 1);
                $em->persist($item);
            }
        }

        // Seed events if empty
        if (count($eventRepo->findAll()) === 0) {
            $events = [
                [
                    'route' => 'event_one',
                    'image' => '/images/carousels/MAY5.jfif',
                    'dest' => 'uploads/events/MAY5.jfif',
                    'badge' => 'SEMINARS',
                    'date' => 'May 5, 2026',
                    'title' => 'Shaping the Future of Education: Utah Valley University, FEU Tech, Unite for AI Innovation Workshop',
                    'description' => 'Join industry leaders as they discuss the future of AI and Machine Learning innovations.'
                ],
                [
                    'route' => 'event_two',
                    'image' => '/images/carousels/TARA.jpg',
                    'dest' => 'uploads/events/TARA.jpg',
                    'badge' => 'EXHIBITIONS',
                    'date' => 'Nov 24, 2026',
                    'title' => '#TaraNaSaPIYU 2026: Welcoming the Next Generation of Innovators at FEU Tech',
                    'description' => 'Showcasing the brightest capstone projects from our graduating engineering students.'
                ],
                [
                    'route' => 'event_three',
                    'image' => '/images/carousels/FTIC.jpg',
                    'dest' => 'uploads/events/FTIC.jpg',
                    'badge' => 'COMPETITIONS',
                    'date' => 'April 24, 2026',
                    'title' => 'FTIC Ramps Up the Culture of Innovation at FEU Tech with a Campus-Wide Symposium',
                    'description' => 'A 48-hour coding marathon to solve real-world problems. Open to all students.'
                ]
            ];
            foreach ($events as $index => $evt) {
                $this->copyAsset($evt['image'], $evt['dest']);
                $item = new HomeEvent();
                $item->setRouteOrUrl($evt['route']);
                $item->setImagePath($evt['dest']);
                $item->setBadge($evt['badge']);
                $item->setDateText($evt['date']);
                $item->setTitle($evt['title']);
                $item->setDescription($evt['description']);
                $item->setSortOrder($index + 1);
                $em->persist($item);
            }
        }

        $em->flush();
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
