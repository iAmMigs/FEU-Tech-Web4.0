<?php

namespace App\Controller\Admin;

use App\Entity\AcademicsLibrary;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;

class AcademicsLibraryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AcademicsLibrary::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable(Action::NEW, Action::DELETE);
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Library Page Content')
            ->setPageTitle('edit', 'Edit Library Content');
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();

        yield FormField::addTab('SEO Meta');
        yield TextField::new('metaTitle', 'Meta Title');
        yield TextareaField::new('metaDescription', 'Meta Description');
        yield TextField::new('metaKeywords', 'Meta Keywords');

        yield FormField::addTab('Hero Section');
        yield TextField::new('heroTitle', 'Hero Title');
        yield TextField::new('heroSubtitle', 'Hero Subtitle/Quote');

        yield FormField::addTab('Location & Contact');
        yield TextField::new('locationRoom', 'Location Room (e.g. Room 1401)');
        yield TextField::new('trunkline', 'Trunkline (e.g. (02) 8281 8888)');
        yield TextField::new('localNumber', 'Local Number (e.g. Local 120/150)');
        yield TextField::new('email', 'Email Address');

        yield FormField::addTab('Visions & Goals');
        yield TextEditorField::new('visionText', 'Vision Description');
        yield TextEditorField::new('missionText', 'Mission Description');
        yield TextEditorField::new('goalText', 'Goal Description');
        yield ArrayField::new('coreValues', 'Core Values (Format: ValueName: Description)');

        yield FormField::addTab('History & Hours');
        yield TextEditorField::new('historyText', 'Library History Description');
        yield ArrayField::new('serviceHours', 'Service Hours List (Format: Day: Hours)');

        yield FormField::addTab('Policies');
        yield ArrayField::new('policies', 'Library Policies List');

        yield FormField::addTab('Publications & Areas');
        yield ArrayField::new('journals', 'Journals & Publications List');
        yield ArrayField::new('libraryAreas', 'Library Areas List (Format: AreaName: Description)');
        yield ArrayField::new('eLibrary', 'E-Library Links (Format: PlatformName: URL)');
    }
}
