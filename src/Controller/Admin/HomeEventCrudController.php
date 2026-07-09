<?php

namespace App\Controller\Admin;

use App\Entity\HomeEvent;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class HomeEventCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return HomeEvent::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Manage Home Events')
            ->setPageTitle('edit', 'Edit Home Event')
            ->setPageTitle('new', 'Add New Home Event')
            ->setDefaultSort(['sortOrder' => 'ASC']);
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        yield TextField::new('title', 'Event Title');
        yield TextField::new('badge', 'Category Badge (e.g. SEMINARS)');
        yield TextField::new('dateText', 'Event Date Text (e.g. May 5, 2026)');
        yield TextareaField::new('description', 'Short Description');
        yield ImageField::new('imagePath', 'Event Banner Image')
            ->setBasePath('/')
            ->setUploadDir('public/uploads/events/')
            ->setUploadedFileNamePattern('uploads/events/[randomhash].[extension]')
            ->setRequired(false);
        yield TextField::new('routeOrUrl', 'Event Route Name or External URL (e.g. event_one)');
        yield IntegerField::new('sortOrder', 'Sort Order');
    }
}
