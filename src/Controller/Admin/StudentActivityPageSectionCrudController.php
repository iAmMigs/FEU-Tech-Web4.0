<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class StudentActivityPageSectionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return \App\Entity\Page::class;
    }
}
