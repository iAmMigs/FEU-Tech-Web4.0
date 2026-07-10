<?php

namespace App\Controller\Admin;

use App\Entity\ProgramFaculty;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class ProgramFacultyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ProgramFaculty::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        yield AssociationField::new('program', 'Academics Program');
        yield TextField::new('name', 'Faculty Name');
        yield TextField::new('role', 'Role (e.g. Director, Faculty Member)');
        yield TextareaField::new('information1', 'Degrees & Qualifications');
        yield TextField::new('specialization', 'Specialization (e.g. Structural Engineering)');
        yield TextareaField::new('information2', 'Credentials & Licenses');
        yield TextareaField::new('affiliation', 'Professional Affiliations');
        yield ImageField::new('image', 'Faculty Image')
            ->setBasePath('/uploads/academics/faculty/')
            ->setUploadDir('public/uploads/academics/faculty/')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired(false);
    }
}
