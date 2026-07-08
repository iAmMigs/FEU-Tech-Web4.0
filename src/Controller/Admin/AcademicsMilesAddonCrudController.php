<?php

namespace App\Controller\Admin;

use App\Entity\AcademicsMilesAddon;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class AcademicsMilesAddonCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AcademicsMilesAddon::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        yield TextField::new('title', 'Addon Title (e.g. Canvas)');
        yield TextField::new('subtitle', 'Addon Subtitle (e.g. Learning Management System)');
        yield TextareaField::new('description', 'Description');
        yield ImageField::new('image', 'Icon Image')
            ->setBasePath('/')
            ->setUploadDir('public/uploads/academics/miles/')
            ->setUploadedFileNamePattern('uploads/academics/miles/[randomhash].[extension]')
            ->setRequired(false);
        yield TextField::new('accent', 'Accent Color Class (e.g. bg-[#E9711C] for orange)');
    }
}
