<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class GeneralPageSectionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return \App\Entity\Page::class;
    }
}
