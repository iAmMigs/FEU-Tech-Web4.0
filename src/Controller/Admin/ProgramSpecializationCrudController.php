<?php

namespace App\Controller\Admin;

use App\Entity\ProgramSpecialization;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class ProgramSpecializationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ProgramSpecialization::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        yield AssociationField::new('program', 'Academics Program');
        yield TextField::new('title', 'Specialization Track Title');
        yield TextareaField::new('description', 'Description');
    }
}
