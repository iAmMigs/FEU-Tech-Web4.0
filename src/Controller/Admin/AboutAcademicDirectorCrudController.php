<?php

namespace App\Controller\Admin;

use App\Entity\AboutAcademicDirector;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;

class AboutAcademicDirectorCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AboutAcademicDirector::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        yield TextField::new('programTitle', 'Program/Department Title');
        yield TextField::new('name', 'Director Name');
        yield TextField::new('role', 'Institutional Role');
        yield EmailField::new('email', 'Email Address')->setRequired(false);
    }
}