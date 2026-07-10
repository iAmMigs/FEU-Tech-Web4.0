<?php

namespace App\Controller\Admin;

use App\Entity\ProgramLaboratory;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class ProgramLaboratoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ProgramLaboratory::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        yield AssociationField::new('program', 'Academics Program');
        yield TextField::new('name', 'Laboratory Name');
        yield TextField::new('roomNumber', 'Room Number & Building (e.g. Room 101 • FIT Building)');
        yield TextareaField::new('description', 'Description');
        yield ImageField::new('image', 'Laboratory Image')
            ->setBasePath('/')
            ->setUploadDir('public/uploads/academics/labs/')
            ->setUploadedFileNamePattern('uploads/academics/labs/[randomhash].[extension]')
            ->setRequired(false);
    }
}
