<?php

namespace App\Controller\Admin;

use App\Entity\AboutExecutiveOfficer;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;

class AboutExecutiveOfficerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AboutExecutiveOfficer::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        yield TextField::new('name', 'Officer Full Name');
        yield TextField::new('role', 'Executive Role / Position');
        yield BooleanField::new('isFeatured', 'Featured Placement (Top stacked row layout)');
    }
}