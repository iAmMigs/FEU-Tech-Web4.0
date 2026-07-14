<?php

namespace App\Controller\Admin;

use App\Entity\StudentJourneySoOrganization;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class StudentJourneySoOrganizationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return StudentJourneySoOrganization::class;
    }


    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Academic Organizations')
            ->setPageTitle('edit', 'Edit Academic Group Profile');
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        yield TextField::new('abbr', 'Abbreviated Identifier (e.g. ACES)');
        yield TextField::new('name', 'Full Academic Organization Name');
        yield TextareaField::new('description', 'Description Context');
        yield ImageField::new('logo', 'Logo Image File')
            ->setBasePath('images/orgs')
            ->setUploadDir('public/images/orgs')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired(false);
    }
}