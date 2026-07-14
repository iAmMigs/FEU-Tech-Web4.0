<?php

namespace App\Controller\Admin;

use App\Entity\StudentJourneyIcare;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;

class StudentJourneyIcareCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return StudentJourneyIcare::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'iCARE Core Settings Overview')
            ->setPageTitle('edit', 'Modify Static Layout Details');
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable(Action::NEW, Action::DELETE);
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();

        yield FormField::addTab('SEO Details');
        yield TextField::new('metaTitle', 'SEO Meta Title');
        yield TextareaField::new('metaDescription', 'SEO Meta Description');
        yield TextField::new('metaKeywords', 'SEO Meta Keywords');

        yield FormField::addTab('Core Header Settings');
        yield ImageField::new('heroImage', 'Top Feature Hero Banner Graphic')
            ->setBasePath('images/studentservice')
            ->setUploadDir('public/images/studentservice')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired(false);

        yield TextField::new('title', 'Main Structural Header (e.g., iCARE)');
        yield TextField::new('subtitle', 'Extended Identification Branding Subtext');
        yield TextField::new('holisticWellnessTitle', 'Upper Box Accent Header');
        yield TextField::new('mentalHealthSupportTitle', 'Upper Box Core Support Header');
        yield TextareaField::new('learningDescription', 'Extended Wellness Informational Block Text');
        
        yield FormField::addTab('Contact & Location Details');
        yield TextField::new('floorLocation', 'Physical Campus Room Assignment Details');
        yield TextField::new('emailAddress', 'Functional Department Inbox Address');
        yield TextField::new('fbLink', 'Social Channel Resource URL');
    }
}