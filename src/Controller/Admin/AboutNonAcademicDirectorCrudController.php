<?php

namespace App\Controller\Admin;

use App\Entity\AboutNonAcademicDirector;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;

class AboutNonAcademicDirectorCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AboutNonAcademicDirector::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        yield TextField::new('programTitle', 'Department / Office Name');
        yield TextField::new('name', 'Director Name');
        yield TextField::new('role', 'Institutional Role');
        yield EmailField::new('email', 'Official Email Address')->setRequired(false);
    }
}