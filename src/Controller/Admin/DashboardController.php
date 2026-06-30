<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use Symfony\Component\HttpFoundation\Response;

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

        yield MenuItem::linkTo(GeneralPageCrudController::class, 'General Pages', 'fas fa-home');

        yield MenuItem::linkToRoute('About Pages', 'fas fa-info-circle', 'admin'); // Placeholder

        yield MenuItem::subMenu('Admissions', 'fas fa-graduation-cap')->setSubItems([
            MenuItem::linkTo(AdmissionPagesCrudController::class, 'Application Procedures', 'fas fa-list'),
            MenuItem::linkTo(AdmissionTuitionFeesCrudController::class, 'Tuition & Fees', 'fas fa-money-bill-wave'),
            MenuItem::linkTo(AdmissionScholarshipsCrudController::class, 'Scholarship Settings', 'fas fa-cog'),
            MenuItem::linkTo(ScholarshipItemCrudController::class, 'Manage Scholarships', 'fas fa-award'),
            MenuItem::linkTo(AdmissionFaqsCrudController::class, 'FAQ Settings', 'fas fa-cog'),
            MenuItem::linkTo(FaqItemCrudController::class, 'Manage FAQ Items', 'fas fa-question-circle'),
        ]);

        yield MenuItem::linkToRoute('Academic Pages', 'fas fa-book', 'admin'); // Placeholder

        yield MenuItem::linkTo(StudentSupportPageCrudController::class, 'Student Support Pages', 'fas fa-users');

        yield MenuItem::linkToRoute('Career Pages', 'fas fa-briefcase', 'admin'); // Placeholder

        yield MenuItem::section('Settings');
        yield MenuItem::linkTo(SiteSettingsCrudController::class, 'Site Settings', 'fas fa-cog');
    }
}
