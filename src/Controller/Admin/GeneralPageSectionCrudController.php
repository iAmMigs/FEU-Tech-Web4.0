<?php

namespace App\Controller\Admin;

use App\Entity\PageSection;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;

class GeneralPageSectionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PageSection::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('sectionName', 'Section Name')->setDisabled()->setColumns(12);
        yield TextareaField::new('textContent', 'Content')->renderAsHtml(false)->setColumns(12);
        yield TextField::new('imagePath', 'Image')
            ->setCssClass('media-manager-input')
            ->setRequired(false)
            ->setColumns(12);
    }
}
