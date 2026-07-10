<?php

use App\Kernel;
use App\Entity\AcademicsDepartment;
use App\Entity\AcademicsProgram;
use App\Entity\ProgramFaculty;
use App\Entity\ProgramLaboratory;
use App\Entity\ProgramSpecialization;
use App\Entity\AcademicsMiles;
use App\Entity\AcademicsMilesAddon;
use App\Entity\AcademicsRegistrar;
use App\Entity\AcademicsLibrary;
use Symfony\Component\Dotenv\Dotenv;

require_once __DIR__.'/vendor/autoload.php';

(new Dotenv())->bootEnv(__DIR__.'/.env');

$kernel = new Kernel($_SERVER['APP_ENV'], (bool) $_SERVER['APP_DEBUG']);
$kernel->boot();

$container = $kernel->getContainer();
$entityManager = $container->get('doctrine')->getManager();

echo "Seeding Academics CMS Data...\n";

// --- DEPARTMENTS ---
$ccsma = $entityManager->getRepository(AcademicsDepartment::class)->findOneBy(['slug' => 'ccsma']);
if (!$ccsma) {
    $ccsma = new AcademicsDepartment();
    $ccsma->setName('College of Computer Studies & Multimedia Arts');
    $ccsma->setSlug('ccsma');
    $ccsma->setHeroImage('/images/offices/academic.png');
    $ccsma->setHeroTitle('College of Computer Studies & Multimedia Arts');
    $ccsma->setHeroSubtitle('Innovation • Technology • Creativity');
    $ccsma->setOverviewTitle('About CCSMA');
    $ccsma->setOverviewDescription('The College of Computer Studies and Multimedia Arts aims to provide high quality education in Information Technology and Multimedia Arts, preparing students to be leaders in the digital landscape.');
    $entityManager->persist($ccsma);
}

$coe = $entityManager->getRepository(AcademicsDepartment::class)->findOneBy(['slug' => 'coe']);
if (!$coe) {
    $coe = new AcademicsDepartment();
    $coe->setName('College of Engineering');
    $coe->setSlug('coe');
    $coe->setHeroImage('/images/offices/academic.png');
    $coe->setHeroTitle('College of Engineering');
    $coe->setHeroSubtitle('Build • Design • Engineer');
    $coe->setOverviewTitle('About COE');
    $coe->setOverviewDescription('The College of Engineering develops globally competitive professionals with strong foundations in science, mathematics, design, and innovation.');
    $entityManager->persist($coe);
}

$gened = $entityManager->getRepository(AcademicsDepartment::class)->findOneBy(['slug' => 'gened']);
if (!$gened) {
    $gened = new AcademicsDepartment();
    $gened->setName('General Education Department');
    $gened->setSlug('gened');
    $gened->setHeroImage('/images/offices/academic.png');
    $gened->setHeroTitle('General Education Department');
    $gened->setHeroSubtitle('Holistic Education • Values • Communication');
    $gened->setOverviewTitle('About GENED');
    $gened->setOverviewDescription('The General Education Department provides a well-rounded educational experience to develop communication skills, critical thinking, and social awareness.');
    $entityManager->persist($gened);
}

$entityManager->flush();

// --- PROGRAMS ---
// BSCE (Civil Engineering)
$bsce = $entityManager->getRepository(AcademicsProgram::class)->findOneBy(['slug' => 'bsce']);
if (!$bsce) {
    $bsce = new AcademicsProgram();
    $bsce->setProgramName('Bachelor of Science in Civil Engineering');
    $bsce->setSlug('bsce');
    $bsce->setDepartment($coe);
    $bsce->setHeroImage('/images/Academics/bsce.png');
    $bsce->setOverviewTitle('General Description of the Program');
    $bsce->setOverviewDescription('<p class="text-slate-600 leading-relaxed text-lg mb-6">The Bachelor of Science in Civil Engineering (BSCE) is a four-year program that aims to provide students with knowledge in mathematics and science to be applied in the different specializations such as structural, transportation, water resource, geotechnical, environmental and construction project management.</p><p class="text-slate-600 leading-relaxed text-lg">Students are trained to develop exceptional skills in planning, design, supervision, and implementation of infrastructures and civil engineering works.</p>');
    $bsce->setObjectivesTitle('Program Educational Objectives');
    $bsce->setObjectivesDescription('Three to five years after graduation, the Civil Engineering alumni shall have:');
    $bsce->setOutcomesTitle('Program/Student Outcomes');
    $bsce->setOutcomesDescription('What every engineering graduate is expected to demonstrate');
    $studentOutcomes = [
        'Apply knowledge of mathematics, natural science, engineering fundamentals and an engineering specialization to the solution of complex engineering problems.',
        'Conduct investigations of complex engineering problems using research-based knowledge and research methods including design of experiments, analysis and interpretation of data, and synthesis of information to provide valid conclusions.',
        'Design solutions for complex engineering problems and design systems, components or processes that meet specified needs with appropriate consideration for public health and safety, cultural, societal, and environmental considerations.',
        'Function effectively as an individual, and as a member or leader in diverse teams and in multi-disciplinary settings.',
        'Identify, formulate, research literature and analyze complex engineering problems reaching substantiated conclusions using first principles of mathematics, natural sciences and engineering sciences.',
        'Apply ethical principles and commit to professional ethics and responsibilities and norms of engineering practice.',
        'Communicate effectively on complex engineering activities with the engineering community and with society at large, such as being able to comprehend and write effective reports and design documentation, make effective presentations, and give and receive clear instructions.',
        'Understand and evaluate the sustainability and impact of professional engineering work in the solution of complex engineering problems in societal and environmental context.',
        'Recognize the need for, and have the preparation and ability to engage in independent and life-long learning in the broadest context of technological change.',
        'Apply reasoning informed by contextual knowledge to assess societal, health, safety, legal and cultural issues and the consequent responsibilities relevant to professional engineering practice and solutions to complex engineering problems.',
        'Create, select and apply appropriate techniques, resources, and modern engineering and IT tools, including prediction and modelling, to complex engineering problems with an understanding of the limitations.',
        'Demonstrate knowledge and understanding of engineering management principles and economic decision-making and apply these to one’s own work, as a member and leader in a team, to manage projects and in multidisciplinary environments.'
    ];
    $bsce->setStudentOutcomes('<ul><li>' . implode('</li><li>', $studentOutcomes) . '</li></ul>');

    $bsce->setAttributesTitle('Engineering Competencies');
    $graduateAttributes = [
        'Engineering Knowledge',
        'Problem Analysis',
        'Design Development',
        'Investigation',
        'Modern Tool Usage',
        'Environment & Sustainability',
        'Ethics',
        'Communication',
        'Project Management',
        'Lifelong Learning'
    ];
    $bsce->setGraduateAttributes('<ul><li>' . implode('</li><li>', $graduateAttributes) . '</li></ul>');

    $bsce->setCareersTitle('Career Opportunities');
    $bsce->setCareersDescription('All graduates of Civil Engineering have career opportunities in different fields such as:');
    $careerOpportunities = [
        'Construction Field',
        'Construction Project Management',
        'Environmental Engineering',
        'Geotechnical Engineering',
        'Oil and Gas',
        'Structural Design',
        'Water Resources'
    ];
    $bsce->setCareerOpportunities('<ul><li>' . implode('</li><li>', $careerOpportunities) . '</li></ul>');
    $bsce->setContactTitle('Contact Us');
    $bsce->setContactDescription('Get in touch with the Civil Engineering Department');
    $bsce->setContactEmail('civileng@feutech.edu.ph');
    $bsce->setContactPhone('(02) 8281 8888 local 101');
    $entityManager->persist($bsce);

    // Faculty members for BSCE
    $faculty1 = new ProgramFaculty();
    $faculty1->setProgram($bsce);
    $faculty1->setName('Kevin Lawrence M. De Jesus');
    $faculty1->setRole('Director');
    $faculty1->setInformation1("Bachelor of Science in Civil Engineering, Adamson University\nMaster of Science in Civil Engineering, Mapúa Institute of Technology\nDoctor of Philosophy in Environmental Engineering, Mapúa University");
    $faculty1->setSpecialization('Environmental Quality Monitoring, Machine Learning');
    $faculty1->setInformation2('Registered Civil Engineer | PICE Environmental and Energy Engineering Specialist');
    $faculty1->setAffiliation('Philippine Institute of Civil Engineers (Life Member), National Research Council of the Philippines, International Association of Engineers');
    $entityManager->persist($faculty1);

    $faculty2 = new ProgramFaculty();
    $faculty2->setProgram($bsce);
    $faculty2->setName('Jon Arnel S. Telan');
    $faculty2->setRole('Assistant Director');
    $faculty2->setInformation1("Bachelor of Science in Civil Engineering, De La Salle University\nMaster of Science in Civil Engineering, De La Salle University\nDoctor of Philosophy in Civil Engineering (On-going), De La Salle University");
    $faculty2->setSpecialization('Structural Engineering');
    $faculty2->setInformation2('Registered Civil Engineer');
    $faculty2->setAffiliation('Philippine Institute of Civil Engineers');
    $entityManager->persist($faculty2);

    // Laboratories for BSCE
    $lab1 = new ProgramLaboratory();
    $lab1->setProgram($bsce);
    $lab1->setName('Materials of Construction Laboratory');
    $lab1->setRoomNumber('Room 101 • FIT Building');
    $lab1->setDescription('Matcons laboratory houses different equipment for testing materials used in construction such as concrete, steel, and asphalt. The centerpiece is the Universal testing machine.');
    $lab1->setImage('/images/Academics/IMG_0400.jpg');
    $entityManager->persist($lab1);

    // Specializations for BSCE
    $spec1 = new ProgramSpecialization();
    $spec1->setProgram($bsce);
    $spec1->setTitle('Structural Engineering');
    $spec1->setDescription('Focuses on the design and analysis of structural systems to resist loads, stresses, and pressures from environmental and external sources.');
    $entityManager->persist($spec1);
}

// BSCS (Computer Science)
$bscs = $entityManager->getRepository(AcademicsProgram::class)->findOneBy(['slug' => 'bscs']);
if (!$bscs) {
    $bscs = new AcademicsProgram();
    $bscs->setProgramName('Bachelor of Science in Computer Science');
    $bscs->setSlug('bscs');
    $bscs->setDepartment($ccsma);
    $bscs->setHeroImage('/images/Academics/bscs.jpg');
    $bscs->setOverviewTitle('General Description');
    $bscs->setOverviewDescription('<p class="text-slate-600 leading-relaxed text-lg mb-6">The Bachelor of Science in Computer Science includes the study of computing concepts and theories, algorithmic foundations, and new developments in computing.</p><p class="text-slate-600 leading-relaxed text-lg mb-6">The program prepares students to design and create algorithmically complex software and develop new and effective algorithms for solving computing problems.</p>');
    $bscs->setObjectivesTitle('Program Educational Objectives');
    $bscs->setObjectivesDescription('Within 3 to 5 years after graduation, graduates of the Bachelor of Science in Computer Science program are:');
    $bscs->setOutcomesTitle('Student Outcomes');
    $bscs->setOutcomesDescription('What every graduate is expected to demonstrate');
    $bscs->setContactTitle('Contact Computer Studies');
    $bscs->setContactDescription('Get in touch with the CCSMA Department');
    $bscs->setContactEmail('ccsma@feutech.edu.ph');
    $entityManager->persist($bscs);
}

$entityManager->flush();

// --- MILES CONTENT ---
$miles = $entityManager->getRepository(AcademicsMiles::class)->findOneBy([]);
if (!$miles) {
    $miles = new AcademicsMiles();
    $miles->setHeroBadge('Learning Enhancement System');
    $miles->setHeroTitle('MILES');
    $miles->setHeroLogo('images/miles/miles-logo.png');
    $miles->setHeroSubtitle('Mastery-based Individualized Learning Enhancement System');
    $miles->setHeroDescription('A pioneering educational ecosystem that extends the capabilities of Canvas to provide mastery-based and individualized learning for FEU Tech students.');
    $miles->setAboutSubtitle('What is MILES?');
    $miles->setAboutTitle('A Smarter Way to Learn');
    $miles->setAboutDescription1('MILES stands for Mastery-based Individualized Learning Enhancement System. It is a pioneering educational system that extends the capability of Canvas to ensure mastery and individualized learning.');
    $miles->setAboutDescription2('Mastery learning is an innovative strategy in education that emphasizes the need for students to achieve a level of mastery in prerequisite topics before moving on to learn subsequent topics.');
    $miles->setAboutDescription3('With MILES, students learn and practice their lessons using well-designed content and assessments geared toward mastery of the lesson.');
    $miles->setCanvasTitle('Powered by Canvas');
    $miles->setCanvasSubtitle('FEU Alabang, FEU Diliman & FEU Tech LMS');
    $miles->setCanvasFeatures([
        'Individualized learning support',
        'Mastery-based assessments',
        'Interactive collaboration tools',
        'Integrated online learning ecosystem'
    ]);
    $miles->setAddonsSubtitle('Integrated Platforms');
    $miles->setAddonsTitle('MILES Add-ons');
    $miles->setAddonsDescription('Industry-leading platforms integrated into one seamless learning ecosystem.');
    $entityManager->persist($miles);
}

// Addons for MILES
$canvasAddon = $entityManager->getRepository(AcademicsMilesAddon::class)->findOneBy(['title' => 'Canvas']);
if (!$canvasAddon) {
    $canvasAddon = new AcademicsMilesAddon();
    $canvasAddon->setTitle('Canvas');
    $canvasAddon->setSubtitle('Learning Management System');
    $canvasAddon->setDescription('Canvas is the most popular learning management system used by the world’s leading universities including Yale and Harvard.');
    $canvasAddon->setImage('canvas.png');
    $canvasAddon->setAccent('bg-[#E9711C]');
    $entityManager->persist($canvasAddon);
}

$bbbAddon = $entityManager->getRepository(AcademicsMilesAddon::class)->findOneBy(['title' => 'BigBlueButton']);
if (!$bbbAddon) {
    $bbbAddon = new AcademicsMilesAddon();
    $bbbAddon->setTitle('BigBlueButton');
    $bbbAddon->setSubtitle('Virtual Classroom');
    $bbbAddon->setDescription('Supports synchronous online classes, consultations, and real-time communication within Canvas.');
    $bbbAddon->setImage('bbb_icon.jpeg');
    $bbbAddon->setAccent('bg-[#2D8CFF]');
    $entityManager->persist($bbbAddon);
}

$entityManager->flush();

// --- REGISTRAR CONTENT ---
$registrar = $entityManager->getRepository(AcademicsRegistrar::class)->findOneBy([]);
if (!$registrar) {
    $registrar = new AcademicsRegistrar();
    $registrar->setHeroBadge('Academic Services');
    $registrar->setHeroTitle('Registrar’s Office');
    $registrar->setHeroDescription('The Registrar’s Office safeguards student academic records with integrity, professionalism, and excellence.');
    $registrar->setHeroEmail('registrar@feutech.edu.ph');
    $registrar->setCalendarYear('2025–2026');
    $registrar->setAboutBadge('Registrar\'s Office');
    $registrar->setAboutTitle('Academic Records with Integrity & Excellence');
    $registrar->setAboutDescription1('The Registrar’s Office is responsible for the school records of all students. It is the principal contact unit with government regulatory agencies.');
    $registrar->setAboutDescription2('The Office of the Registrar, in accordance with existing laws and regulations and the school’s rules, is solely responsible for the issuance of records.');
    $registrar->setObjectivesBadge('Registrar Goals');
    $registrar->setObjectivesTitle('General Objective');
    $registrar->setObjectivesDescription1('The Registrar’s Office aims to produce scholastic records with utmost integrity and credibility. Its goal is to draw a clear line of systematic functions.');
    $registrar->setObjectivesDescription2('It mainly focuses on providing meaningful and accurate information when and where it is needed and must necessarily ensure the integrity of curricular records.');
    $registrar->setMissionBadge('Our Purpose');
    $registrar->setMissionTitle('Mission');
    $registrar->setMissionDescription('The FEU Tech Registrar and RO associates are committed to excellence and professionalism in provision of services. Corollary, they seek to provide relevant and accessible programs.');
    $registrar->setVisionBadge('Our Vision');
    $registrar->setVisionTitle('Vision');
    $registrar->setVisionDescription('The Registrar\'s Office envisions to be a benchmark for student record administration and academic services, committed to quality, integrity, and efficiency.');
    $entityManager->persist($registrar);
}

$entityManager->flush();

// --- LIBRARY CONTENT ---
$library = $entityManager->getRepository(AcademicsLibrary::class)->findOneBy([]);
if (!$library) {
    $library = new AcademicsLibrary();
    $library->setHeroTitle('FEU TECH LIBRARY');
    $library->setHeroSubtitle('"The center of excellence in providing knowledge and quality information."');
    $library->setLocationRoom('Room 1401');
    $library->setTrunkline('(02) 8281 8888');
    $library->setLocalNumber('Local 120/150');
    $library->setEmail('library@feutech.edu.ph');
    $library->setVisionText('The FEU Tech Library aims to be the center of excellence in providing knowledge and quality information, supporting the College\'s commitment to produce quality individuals.');
    $library->setMissionText('The mission of the FEU Tech Library is to provide service and develop a collection that will support the instructional, curricular, research and industry needs of the College.');
    $library->setGoalText('To provide a dynamic environment of academic learning by utilizing information technology, bibliographic management, and efficient library service.');
    $library->setCoreValues([
        'Innovation: While respecting current practices, the Library also strives for innovation. We value not just the new, but that which is new and better.',
        'Integrity: We commit to absolute honesty, professionalism, and fairness in all services.'
    ]);
    $library->setHistoryText('The FEU Tech Library was established to serve the library requirements of the students and faculty members. Over the years, it has transformed into a digital knowledge hub.');
    $library->setServiceHours([
        'Mondays to Fridays: 7:30 AM – 7:30 PM',
        'Saturdays: 8:00 AM – 5:00 PM'
    ]);
    $library->setPolicies([
        'Silent Study Policy must be observed at all times.',
        'No food and open drinks allowed inside the library.',
        'Bags must be deposited at the baggage counter.'
    ]);
    $library->setJournals([
        'IEEE Transactions on Computers',
        'ACM Computing Surveys',
        'International Journal of Software Engineering'
    ]);
    $library->setLibraryAreas([
        'Circulation Section: Where books are borrowed and returned.',
        'Reference Section: Encompasses encyclopedias, dictionaries, and handbooks.',
        'E-Library Section: Computer terminals for online databases access.'
    ]);
    $library->setELibrary([
        'IEEE Xplore: https://ieeexplore.ieee.org',
        'ScienceDirect: https://www.sciencedirect.com'
    ]);
    $entityManager->persist($library);
}

$entityManager->flush();

echo "Seeding completed successfully!\n";
