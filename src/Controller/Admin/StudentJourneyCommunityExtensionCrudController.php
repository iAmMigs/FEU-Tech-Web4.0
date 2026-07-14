<?php

namespace App\Controller\Admin;

use App\Entity\StudentJourneyCommunityExtension;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;

class StudentJourneyCommunityExtensionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return StudentJourneyCommunityExtension::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions->disable(Action::NEW, Action::DELETE);
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'CESU Global Configurations')
            ->setPageTitle('edit', 'Edit Values & Presentation Core Content');
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();

        yield FormField::addTab('SEO Metas');
        yield TextField::new('metaTitle', 'SEO Meta Title');
        yield TextareaField::new('metaDescription', 'SEO Meta Description');
        yield TextField::new('metaKeywords', 'SEO Meta Keywords');

        yield FormField::addTab('Header Intro Elements');
        yield TextField::new('heroTitle', 'Main Display Title');
        yield TextareaField::new('heroSubtitle', 'Hero Description');
        yield ImageField::new('heroImage', 'Custom Background Image Layer')
            ->setBasePath('images/studentservice')
            ->setUploadDir('public/images/studentservice')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired(false);

        yield FormField::addTab('Core Foundations Mapping');
        yield FormField::addFieldset('Advocacy Configuration');
        yield TextField::new('advocacyTitle', 'Advocacy Card Header');
        yield TextareaField::new('advocacyDescription', 'Advocacy Context Description');

        yield FormField::addFieldset('Compassion Configuration');
        yield TextField::new('compassionTitle', 'Compassion Card Header');
        yield TextareaField::new('compassionDescription', 'Compassion Context Description');

        yield FormField::addFieldset('Empowerment Configuration');
        yield TextField::new('empowermentTitle', 'Empowerment Card Header');
        yield TextareaField::new('empowermentDescription', 'Empowerment Context Description');
    }
}