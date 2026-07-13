<?php

namespace App\Controller\Admin;

use App\Entity\AboutAcademicService;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AboutAcademicServiceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AboutAcademicService::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        yield TextField::new('serviceTitle', 'Office / Department Title');
        yield TextField::new('name', 'In-Charge Personnel Name');
        yield TextField::new('role', 'Official Position / Title')->setRequired(false);
    }
}