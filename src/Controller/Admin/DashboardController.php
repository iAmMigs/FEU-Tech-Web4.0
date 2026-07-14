<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\Admin\PaymentOptionCrudController;
use App\Controller\Admin\HistoryItemCrudController;
use App\Controller\Admin\HistoryFooterCrudController;
use App\Controller\Admin\AboutVisionMisionCrudController;
use App\Controller\Admin\AboutFacilitiesPageCrudController;
use App\Controller\Admin\AboutFacilitiesTabCrudController;
use App\Controller\Admin\AboutAcademicDirectorCrudController;
use App\Controller\Admin\AboutExecutiveOfficerCrudController;
use App\Controller\Admin\AboutAcademicServiceCrudController;
use App\Controller\Admin\AboutNonAcademicDirectorCrudController;
use App\Controller\Admin\AboutOfficeCrudController;

use App\Controller\Admin\StudentJourneySaCrudController;
use App\Controller\Admin\StudentJourneyDuCrudController;
use App\Controller\Admin\StudentJourneySoCrudController;
use App\Controller\Admin\StudentJourneySoOrganizationCrudController;
use App\Controller\Admin\StudentJourneySpecialSoOrganizationCrudController;
use App\Controller\Admin\StudentJourneyCommunityExtensionCrudController;
use App\Controller\Admin\StudentJourneyCommunityExtensionProgramsCrudController;
use App\Controller\Admin\StudentJourneyHealthServiceCrudController;
use App\Controller\Admin\StudentJourneyHealthServiceProgramsCrudController;
use App\Controller\Admin\StudentJourneyGuidanceCrudController;
use App\Controller\Admin\StudentJourneyGuidanceCounselingProgramsCrudController;
use App\Controller\Admin\StudentJourneyIcareCrudController;
use App\Controller\Admin\StudentJourneyIcareServicesCrudController;
use App\Controller\Admin\StudentJourneyIalapCrudController;

use App\Controller\Admin\AcademicsDepartmentCrudController;
use App\Controller\Admin\AcademicsProgramCrudController;
use App\Controller\Admin\ProgramFacultyCrudController;
use App\Controller\Admin\ProgramLaboratoryCrudController;
use App\Controller\Admin\ProgramSpecializationCrudController;
use App\Controller\Admin\AcademicsMilesCrudController;
use App\Controller\Admin\AcademicsMilesAddonCrudController;
use App\Controller\Admin\AcademicsRegistrarCrudController;
use App\Controller\Admin\AcademicsLibraryCrudController;
use App\Controller\Admin\MagazineItemCrudController;
use App\Controller\Admin\TambayanVideoCrudController;
use App\Controller\Admin\HomeEventCrudController;
use App\Controller\Admin\JobOpportunityCrudController;
use App\Controller\Admin\JobCareersCrudController;

#[AdminDashboard(routePath: '/admin', routeName: 'admin')]
class DashboardController extends AbstractDashboardController
{
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('<img src="/images/Tech_Logo.png" style="max-height: 25px; margin-right: 10px; vertical-align: middle;"> Content Management System');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::subMenu('General Module', 'fas fa-home')->setSubItems([
            MenuItem::linkTo(GeneralPageCrudController::class, 'Page Settings', 'fas fa-cog'),
            MenuItem::linkTo(MagazineItemCrudController::class, 'Manage Magazines', 'fas fa-book-open'),
            MenuItem::linkTo(TambayanVideoCrudController::class, 'Manage Tambayan Videos', 'fas fa-video'),
            MenuItem::linkTo(HomeEventCrudController::class, 'Manage Events', 'fas fa-calendar-alt'),
        ]);

        yield MenuItem::subMenu('About Pages', 'fas fa-info-circle')->setSubItems([
            MenuItem::linkTo(HistoryItemCrudController::class, 'History Timeline', 'fas fa-history'),
            MenuItem::linkTo(HistoryFooterCrudController::class, 'History Footer Settings', 'fas fa-shoe-prints'),
            MenuItem::linkTo(AboutVisionMisionCrudController::class, 'Vision and Mission', 'fas fa-eye'),
            MenuItem::linkTo(AboutFacilitiesPageCrudController::class, 'Facilities Page Settings', 'fas fa-building'),
            MenuItem::linkTo(AboutFacilitiesTabCrudController::class, 'Facilities Tab Management', 'fas fa-th-large'),
            MenuItem::linkTo(AboutExecutiveOfficerCrudController::class, 'Executive Officers', 'fas fa-user-tie'),
            MenuItem::linkTo(AboutAcademicDirectorCrudController::class, 'Academic Directors', 'fas fa-user-friends'),
            MenuItem::linkTo(AboutAcademicServiceCrudController::class, 'Academic Services', 'fas fa-chalkboard-teacher'),
            MenuItem::linkTo(AboutNonAcademicDirectorCrudController::class, 'Non-Academic Directors', 'fas fa-user-friends'),
            MenuItem::linkTo(AboutOfficeCrudController::class, 'Offices', 'fas fa-building'),
        ]);

        yield MenuItem::subMenu('Admissions', 'fas fa-graduation-cap')->setSubItems([
            MenuItem::linkTo(AdmissionPagesCrudController::class, 'Application Procedures', 'fas fa-list'),
            MenuItem::linkTo(AdmissionTuitionFeesCrudController::class, 'Tuition & Fees', 'fas fa-money-bill-wave'),
            MenuItem::linkTo(PaymentOptionCrudController::class, 'Payment Options', 'fas fa-credit-card'),
            MenuItem::linkTo(AdmissionScholarshipsCrudController::class, 'Scholarship Settings', 'fas fa-cog'),
            MenuItem::linkTo(ScholarshipItemCrudController::class, 'Manage Scholarships', 'fas fa-award'),
            MenuItem::linkTo(AdmissionFaqsCrudController::class, 'FAQ Settings', 'fas fa-cog'),
            MenuItem::linkTo(FaqItemCrudController::class, 'Manage FAQ Items', 'fas fa-question-circle'),
        
        ]);

        yield MenuItem::subMenu('Academics', 'fas fa-book')->setSubItems([
            MenuItem::linkTo(AcademicsDepartmentCrudController::class, 'Departments', 'fas fa-university'),
            MenuItem::linkTo(AcademicsProgramCrudController::class, 'Programs', 'fas fa-graduation-cap'),
            MenuItem::linkTo(ProgramFacultyCrudController::class, 'Faculty Directory', 'fas fa-users'),
            MenuItem::linkTo(ProgramLaboratoryCrudController::class, 'Laboratories', 'fas fa-flask'),
            MenuItem::linkTo(ProgramSpecializationCrudController::class, 'Specializations', 'fas fa-route'),
            MenuItem::linkTo(AcademicsMilesCrudController::class, 'MILES Content', 'fas fa-desktop'),
            MenuItem::linkTo(AcademicsMilesAddonCrudController::class, 'MILES Addons', 'fas fa-plug'),
            MenuItem::linkTo(AcademicsRegistrarCrudController::class, 'Registrar\'s Office', 'fas fa-file-invoice'),
            MenuItem::linkTo(AcademicsLibraryCrudController::class, 'Library Services', 'fas fa-book-reader'),
        ]);

        yield MenuItem::subMenu('Student Services', 'fas fa-user-graduate')->setSubItems([
            MenuItem::linkTo(StudentJourneySaCrudController::class, 'Student Affairs', 'fas fa-user-friends'),
            MenuItem::linkTo(StudentJourneyDuCrudController::class, 'Discipline Unit', 'fas fa-user-shield'),
            MenuItem::linkTo(StudentJourneySoCrudController::class, 'Student Organizations', 'fas fa-users'),
            MenuItem::linkTo(StudentJourneySoOrganizationCrudController::class, 'SO Organizations', 'fas fa-users'),
            MenuItem::linkTo(StudentJourneySpecialSoOrganizationCrudController::class, 'Special SO Organizations', 'fas fa-users'),
            MenuItem::linkTo(StudentJourneyCommunityExtensionCrudController::class, 'Community Extension', 'fas fa-hands-helping'),
            MenuItem::linkTo(StudentJourneyCommunityExtensionProgramsCrudController::class, 'Community Extension Programs', 'fas fa-hands-helping'),
            MenuItem::linkTo(StudentJourneyHealthServiceCrudController::class, 'Health Services', 'fas fa-heartbeat'),
            MenuItem::linkTo(StudentJourneyHealthServiceProgramsCrudController::class, 'Health Service Programs', 'fas fa-heartbeat'),
            MenuItem::linkTo(StudentJourneyGuidanceCrudController::class, 'Guidance Programs & Services', 'fas fa-user-md'),
            MenuItem::linkTo(StudentJourneyGuidanceCounselingProgramsCrudController::class, 'Guidance & Counseling', 'fas fa-user-md'),
            MenuItem::linkTo(StudentJourneyIcareCrudController::class, 'iCARE Page Content', 'fas fa-hands-helping'),
            MenuItem::linkTo(StudentJourneyIcareServicesCrudController::class, 'iCARE Dynamic Services', 'fas fa-hands-helping'),
            MenuItem::linkTo(StudentJourneyIalapCrudController::class, 'Alumni & Placement Page Content', 'fas fa-user-graduate'),
        ]);


        yield MenuItem::subMenu('Careers Management', 'fas fa-briefcase')->setSubItems([
            MenuItem::linkTo(JobOpportunityCrudController::class, 'Open Job Positions', 'fas fa-id-card'),
            MenuItem::linkTo(JobCareersCrudController::class, 'Edit Page Text Content', 'fas fa-edit'),
        ]);

        yield MenuItem::section('Settings');
        yield MenuItem::linkTo(SiteSettingsCrudController::class, 'Site Settings', 'fas fa-cog');
    }
}