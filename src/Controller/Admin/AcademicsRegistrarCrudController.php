<?php

namespace App\Controller\Admin;

use App\Entity\AcademicsRegistrar;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

class AcademicsRegistrarCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AcademicsRegistrar::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable(Action::NEW, Action::DELETE);
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Registrar\'s Office Page Content')
            ->setPageTitle('edit', 'Edit Registrar\'s Office Content');
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();

        yield FormField::addTab('SEO Meta');
        yield TextField::new('metaTitle', 'Meta Title');
        yield TextareaField::new('metaDescription', 'Meta Description');
        yield TextField::new('metaKeywords', 'Meta Keywords');

        yield FormField::addTab('Hero Section');
        yield TextField::new('heroBadge', 'Hero Badge (e.g. Academic Services)');
        yield TextField::new('heroTitle', 'Hero Title');
        yield TextareaField::new('heroDescription', 'Hero Description');
        yield TextField::new('heroEmail', 'Registrar Contact Email');
        yield TextField::new('calendarYear', 'Calendar Year (e.g. 2025–2026)');

        yield FormField::addTab('About Section');
        yield TextField::new('aboutBadge', 'About Badge');
        yield TextField::new('aboutTitle', 'About Title');
        yield TextEditorField::new('aboutDescription1', 'About Paragraph 1');
        yield TextEditorField::new('aboutDescription2', 'About Paragraph 2');

        yield FormField::addTab('Objectives');
        yield TextField::new('objectivesBadge', 'Objectives Badge');
        yield TextField::new('objectivesTitle', 'Objectives Title');
        yield TextEditorField::new('objectivesDescription1', 'Objectives Card 1 Content');
        yield TextEditorField::new('objectivesDescription2', 'Objectives Card 2 Content');

        yield FormField::addTab('Mission & Vision');
        yield TextField::new('missionBadge', 'Mission Badge');
        yield TextField::new('missionTitle', 'Mission Title');
        yield TextEditorField::new('missionDescription', 'Mission Description');
        yield TextField::new('visionBadge', 'Vision Badge');
        yield TextField::new('visionTitle', 'Vision Title');
        yield TextEditorField::new('visionDescription', 'Vision Description');
    }
}
