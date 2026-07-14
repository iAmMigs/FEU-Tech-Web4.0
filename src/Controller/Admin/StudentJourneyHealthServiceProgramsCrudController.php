<?php

namespace App\Controller\Admin;

use App\Entity\StudentJourneyHealthServicePrograms;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;

class StudentJourneyHealthServiceProgramsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return StudentJourneyHealthServicePrograms::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Manage Medical & Dental Programs')
            ->setPageTitle('new', 'Add Medical/Dental Program')
            ->setPageTitle('edit', 'Edit Program Configuration');
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        
        yield ChoiceField::new('type', 'Program Card Mode Style')
            ->setChoices([
                'Medical (Red theme styling)' => 'medical',
                'Dental (Cyan theme styling)' => 'dental',
            ]);

        yield TextField::new('title', 'Program Title');
        yield TextField::new('tagLabel', 'Sub-heading Tag Label (Optional, e.g. Pandemic advice)')
            ->setRequired(false);

        yield TextareaField::new('servicesList', 'Services Rendered (Separate items with commas)')
            ->setHelp('Example: Dental Consultation, Dental Extraction, Dental Prophylaxis');
    }
}