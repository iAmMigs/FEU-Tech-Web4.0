<?php

namespace App\Controller\Admin;

use App\Entity\StudentJourneyIalap;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;

class StudentJourneyIalapCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return StudentJourneyIalap::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Alumni & Placement Configuration Panel')
            ->setPageTitle('edit', 'Modify Page Components');
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions->disable(Action::NEW, Action::DELETE);
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();

        yield FormField::addTab('Meta Details');
        yield TextField::new('metaTitle', 'Browser Title Element Mapping')->hideOnIndex();
        yield TextareaField::new('metaDescription', 'Search Index Meta Snippet Text')->hideOnIndex();
        yield TextField::new('metaKeywords', 'Search Keyword Target Expressions')->hideOnIndex();

        yield FormField::addTab('Hero Banner & Header Block');
        yield FormField::addFieldset('Hero Header Banner Block')->setIcon('fa fa-image');
        yield ImageField::new('heroImage', 'Top Banner Wallpaper Segment')
            ->setBasePath('images/studentservice')
            ->setUploadDir('public/images/studentservice')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired(false);

        yield TextField::new('title', 'Main Primary Header Element');
        yield TextField::new('subtitle', 'Department Formal Expansion Text');
        yield TextField::new('tagline', 'Inspirational Sub-tagline Block Message');

        yield FormField::addTab('Content and Alumni Callout Box');
        yield TextField::new('welcomeTitle', 'Inner Section Header Title Line');
        yield TextareaField::new('welcomeDescription', 'Main Multi-Paragraph Welcome Segment Box Content');

        yield TextField::new('cardTitle', 'Callout Box Accent Header');
        yield TextField::new('cardPriceSub', 'Card Transaction Pricing Notification Banner');
        yield TextareaField::new('cardProcessNotes', 'Compliance and Procedural Directives');
        yield TextField::new('cardLearnMoreUrl', 'External Application Web Interface Link Address');

        yield FormField::addTab('Contact Information');
        yield TextField::new('officeLocation', 'Office Building Suite Coordinates');
        yield TextField::new('officeEmail', 'Department Electronic Direct Inbox');
        yield TextField::new('officeLocalPhone', 'Campus Telephonic Line Routing ID');
        yield TextField::new('fbLink', 'Social Media Destination URL Mapping');
    }
}