<?php

namespace App\Controller\Admin;

use App\Entity\AcademicsDepartment;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

class AcademicsDepartmentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AcademicsDepartment::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable(Action::NEW, Action::DELETE);
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Academics Departments')
            ->setPageTitle('edit', fn (AcademicsDepartment $dept) => sprintf('Edit %s Department Content', $dept->getName()));
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();

        yield FormField::addTab('Department Info');
        yield TextField::new('name', 'Department Name')->setDisabled();
        yield TextField::new('slug', 'Slug')->setDisabled()->hideOnIndex();

        yield FormField::addTab('SEO Meta');
        yield TextField::new('metaTitle', 'Meta Title')->onlyOnForms();
        yield TextareaField::new('metaDescription', 'Meta Description')->onlyOnForms();
        yield TextField::new('metaKeywords', 'Meta Keywords')->onlyOnForms();

        yield FormField::addTab('Hero Section');
        yield ImageField::new('heroImage', 'Hero Background Image')
            ->setBasePath('/')
            ->setUploadDir('public/uploads/academics/')
            ->setUploadedFileNamePattern('uploads/academics/[randomhash].[extension]')
            ->setRequired(false)
            ->onlyOnForms();
        yield TextField::new('heroTitle', 'Main Title')->onlyOnForms();
        yield TextField::new('heroSubtitle', 'Subtitle')->onlyOnForms();

        yield FormField::addTab('Overview');
        yield TextField::new('overviewTitle', 'Overview Title')->onlyOnForms();
        yield TextEditorField::new('overviewDescription', 'Overview Description')->onlyOnForms();

        yield FormField::addTab('Objectives');
        yield TextField::new('objectivesTitle', 'Objectives Title')->onlyOnForms();
        yield TextEditorField::new('objectivesDescription', 'Objectives Description')->onlyOnForms();

        yield FormField::addTab('Outcomes');
        yield TextField::new('outcomesTitle', 'Outcomes Title')->onlyOnForms();
        yield TextEditorField::new('outcomesDescription', 'Outcomes Description')->onlyOnForms();
    }
}
