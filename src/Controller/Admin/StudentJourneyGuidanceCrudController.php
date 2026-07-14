<?php

namespace App\Controller\Admin;

use App\Entity\StudentJourneyGuidance;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;

class StudentJourneyGuidanceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return StudentJourneyGuidance::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions->disable(Action::NEW, Action::DELETE);
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Guidance Core Customization')
            ->setPageTitle('edit', 'Edit Core Layout Details');
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();

        yield FormField::addTab('SEO Optimization');
        yield TextField::new('metaTitle', 'Metadata Title');
        yield TextareaField::new('metaDescription', 'Metadata Description');
        yield TextField::new('metaKeywords', 'Metadata Keywords');

        yield FormField::addTab('Hero & Banner Uploads');
        yield TextField::new('heroTitle', 'Main Header Title');
        yield TextareaField::new('heroSubtitle', 'Main Header Text Subtitle');
        
        yield ImageField::new('heroImage', 'Hero Overlay Background')
            ->setBasePath('images/studentservice')
            ->setUploadDir('public/images/studentservice')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired(false);

        yield ImageField::new('bannerImage', 'Team Accent Banner Photo')
            ->setBasePath('images/studentservice')
            ->setUploadDir('public/images/studentservice')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired(false);

        yield FormField::addTab('Body Layout Content');
        yield TextField::new('overviewTitle', 'Overview Headline');
        yield TextareaField::new('overviewDescription', 'Overview Long Description');
        yield TextField::new('missionTitle', 'Mission Title');
        yield TextareaField::new('missionDescription', 'Mission Long Description');
        yield UrlField::new('faqUrl', 'View GCU FAQs Destination Hyperlink URL');
    }
}