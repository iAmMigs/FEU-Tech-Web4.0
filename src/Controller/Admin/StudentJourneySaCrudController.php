<?php

namespace App\Controller\Admin;

use App\Entity\StudentJourneySa;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;

class StudentJourneySaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return StudentJourneySa::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'SA Journey Settings')
            ->setPageTitle('edit', 'Edit Student Activities & Development Content');
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();

        yield FormField::addTab('SEO Meta');
        yield TextField::new('metaTitle', 'SEO Meta Title');
        yield TextareaField::new('metaDescription', 'SEO Meta Description');
        yield TextField::new('metaKeywords', 'SEO Meta Keywords');

        yield FormField::addTab('Hero Section');
        yield TextField::new('heroTitle', 'Main Title');
        yield TextareaField::new('heroSubtitle', 'Subtitle');
        yield ImageField::new('heroImage', 'Hero Background Image')
            ->setBasePath('images/studentservice')
            ->setUploadDir('public/images/studentservice')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired(false);

        yield FormField::addTab('Core Declarations');
        yield TextareaField::new('visionText', 'Vision Statement Text');
        yield ArrayField::new('missionItems', 'Mission Points');

        yield FormField::addTab('The Mantra');
        yield TextField::new('titleOne', 'Pillar One Title');
        yield TextareaField::new('titleOneText', 'Pillar One Content');

        yield TextField::new('titleTwo', 'Pillar Two Title');
        yield TextareaField::new('titleTwoText', 'Pillar Two Content');

        yield TextField::new('titleThree', 'Pillar Three Title');
        yield TextareaField::new('titleThreeText', 'Pillar Three Content');

        yield FormField::addTab('Activities & Dev');
        yield TextareaField::new('devDescription', 'Development Description');
        yield ArrayField::new('devBullets', 'Development Bullets');
        yield TextareaField::new('actDescription', 'Activities Description');
        yield ArrayField::new('actBullets', 'Activities Bullets');

        yield FormField::addTab('Contact Info');
        yield TextField::new('contactRoom', 'Location Room');
        yield TextField::new('contactPhone', 'Phone Line');
        yield TextField::new('contactEmail', 'Email Address');
    }
}