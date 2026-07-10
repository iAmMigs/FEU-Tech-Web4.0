<?php

namespace App\Controller\Admin;

use App\Entity\AcademicsMiles;
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
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;

class AcademicsMilesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AcademicsMiles::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable(Action::NEW, Action::DELETE);
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'MILES Page Content')
            ->setPageTitle('edit', 'Edit MILES Page Content');
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();

        yield FormField::addTab('SEO Meta');
        yield TextField::new('metaTitle', 'Meta Title');
        yield TextareaField::new('metaDescription', 'Meta Description');
        yield TextField::new('metaKeywords', 'Meta Keywords');

        yield FormField::addTab('Hero Section');
        yield TextField::new('heroBadge', 'Hero Badge (e.g. Learning Enhancement System)');
        yield ImageField::new('heroLogo', 'Hero Logo Image')
            ->setBasePath('/')
            ->setUploadDir('public/uploads/academics/')
            ->setUploadedFileNamePattern('uploads/academics/[randomhash].[extension]')
            ->setRequired(false);
        yield TextField::new('heroTitle', 'Main Title');
        yield TextField::new('heroSubtitle', 'Subtitle');
        yield TextareaField::new('heroDescription', 'Hero Description');

        yield FormField::addTab('About Section');
        yield TextField::new('aboutSubtitle', 'About Subtitle (e.g. What is MILES?)');
        yield TextField::new('aboutTitle', 'About Title');
        yield TextEditorField::new('aboutDescription1', 'About Description Paragraph 1');
        yield TextEditorField::new('aboutDescription2', 'About Description Paragraph 2');
        yield TextEditorField::new('aboutDescription3', 'About Description Paragraph 3');

        yield FormField::addTab('Canvas Feature Box');
        yield TextField::new('canvasTitle', 'Canvas Title');
        yield TextField::new('canvasSubtitle', 'Canvas Subtitle');
        yield ArrayField::new('canvasFeatures', 'Canvas Features List');

        yield FormField::addTab('Addons Section Header');
        yield TextField::new('addonsSubtitle', 'Addons Section Subtitle');
        yield TextField::new('addonsTitle', 'Addons Section Title');
        yield TextareaField::new('addonsDescription', 'Addons Section Description');
    }
}
