<?php

namespace App\Controller\Admin;

use App\Entity\StudentJourneyCommunityExtensionPrograms;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;

class StudentJourneyCommunityExtensionProgramsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return StudentJourneyCommunityExtensionPrograms::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'iTam Programs Overview')
            ->setPageTitle('edit', 'Update Program Properties');
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        yield TextField::new('title', 'Program Code Name (e.g. iTamBayani)');
        yield TextareaField::new('description', 'Target Scope Description');
        yield TextareaField::new('acts', 'Core Actions (Comma Delimited Text Entry)');
    }
}