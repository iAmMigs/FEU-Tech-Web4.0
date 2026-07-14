<?php

namespace App\Controller\Admin;

use App\Entity\StudentJourneyDu;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;

class StudentJourneyDuCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return StudentJourneyDu::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable(Action::NEW, Action::DELETE);
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'DU Journey Settings')
            ->setPageTitle('edit', 'Edit Student Discipline Unit Content');
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();

        yield FormField::addTab('SEO Meta');
        yield TextField::new('metaTitle', 'SEO Meta Title');
        yield TextareaField::new('metaDescription', 'SEO Meta Description');
        yield TextField::new('metaKeywords', 'SEO Meta Keywords');

        yield FormField::addTab('Hero & Overview');
        yield TextField::new('heroTitle', 'Hero Title');
        yield TextareaField::new('heroSubtitle', 'Hero Subtitle');
        yield ImageField::new('heroImage', 'Hero Background Image')
            ->setBasePath('images/studentservice')
            ->setUploadDir('public/images/studentservice')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired(false);
        yield TextareaField::new('overviewText', 'Overview Summary');

        yield FormField::addTab('Policy & Security');
        yield FormField::addFieldset('Policy Settings');
        yield TextField::new('policyTitle', 'Section Title');
        yield ArrayField::new('policyItems', 'Bullet Points (JSON List)');

        yield FormField::addFieldset('Safety & Security Settings');
        yield TextField::new('safetyTitle', 'Section Title');
        yield TextareaField::new('safetyDescription', 'Section Description');

        yield FormField::addTab('Clearance & Lost/Found');
        yield FormField::addFieldset('Clearances');
        yield TextField::new('clearancesTitle', 'Section Title');
        yield ArrayField::new('clearancesItems', 'Offered Clearances');

        yield FormField::addFieldset('Lost and Found');
        yield TextField::new('lostFoundTitle', 'Section Title');
        yield TextareaField::new('lostFoundDescription', 'Section Description');

        yield FormField::addTab('Office Details');
        yield TextField::new('contactRoom', 'Office Room');
        yield TextField::new('contactPhone', 'Telephone');
        yield TextField::new('contactEmail', 'Email Address');
    }
}