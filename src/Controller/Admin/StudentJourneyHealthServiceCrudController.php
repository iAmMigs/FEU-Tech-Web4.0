<?php

namespace App\Controller\Admin;

use App\Entity\StudentJourneyHealthService;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;

class StudentJourneyHealthServiceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return StudentJourneyHealthService::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        // Explicitly disable adding and deleting
        return $actions->disable(Action::NEW, Action::DELETE);
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Health Service Page Configurations')
            ->setPageTitle('edit', 'Modify Static Clinic Elements');
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();

        yield FormField::addTab('SEO Details');
        yield TextField::new('metaTitle', 'SEO Meta Title');
        yield TextareaField::new('metaDescription', 'SEO Meta Description');
        yield TextField::new('metaKeywords', 'SEO Meta Keywords');

        yield FormField::addTab('Core Header Setting');
        yield TextField::new('heroTitle', 'Header Title Display');
        yield TextareaField::new('heroSubtitle', 'Header Subtitle Display');
        yield ImageField::new('heroImage', 'Hero Background Override')
            ->setBasePath('images/studentservice')
            ->setUploadDir('public/images/studentservice')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired(false);

        yield FormField::addTab('Well-being & Telemedicine');
        yield FormField::addFieldset('Section Information Block');
        yield TextField::new('wellbeingTitle', 'Headline Section Title');
        yield TextareaField::new('wellbeingDescription', 'Headline Description Text');

        yield FormField::addFieldset('Telemedicine Banner Info');
        yield TextField::new('telemedicineTitle', 'Alert Alert Header');
        yield TextareaField::new('telemedicineDescription', 'Alert Paragraph Context');
    }
}