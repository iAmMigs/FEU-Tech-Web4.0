<?php

namespace App\Controller\Admin;

use App\Entity\StudentJourneySo;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;

class StudentJourneySoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return StudentJourneySo::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions->disable(Action::NEW, Action::DELETE);
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Student Organizations Global Settings')
            ->setPageTitle('edit', 'Edit Core Page Information');
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();

        yield FormField::addTab('SEO Details');
        yield TextField::new('metaTitle', 'Meta Page Title');
        yield TextareaField::new('metaDescription', 'Meta Description');
        yield TextField::new('metaKeywords', 'Meta Keywords');

        yield FormField::addTab('Header & Intro');
        yield TextField::new('heroTitle', 'Hero Title Banner');
        yield TextareaField::new('heroSubtitle', 'Hero Subtitle Text');
        yield ImageField::new('heroImage', 'Hero Background Image')
            ->setBasePath('images/studentservice')
            ->setUploadDir('public/images/studentservice')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired(false);

        yield FormField::addTab('Core Bodies');
        yield FormField::addFieldset('Student Coordinating Council');
        yield TextField::new('sccTitle', 'SCC Card Header');
        yield TextareaField::new('sccDescription', 'SCC Body Description');

        yield FormField::addFieldset('The Innovator Publication');
        yield TextField::new('innovatorTitle', 'The Innovator Card Header');
        yield TextareaField::new('innovatorDescription', 'The Innovator Body Description');

        yield FormField::addTab('Section Headings');
        yield TextField::new('academicTitle', 'Academic Organizations Section Title');
        yield TextField::new('specialTitle', 'Special Interest Section Title');
        yield TextareaField::new('specialSubtitle', 'Special Interest Subtitle Text');
    }
}