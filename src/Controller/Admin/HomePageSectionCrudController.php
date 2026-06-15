<?php

namespace App\Controller\Admin;

use App\Entity\PageSection;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class HomePageSectionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PageSection::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('sectionName', 'Section Name');
        yield TextEditorField::new('textContent', 'Content');
        yield ImageField::new('imagePath', 'Image')
            ->setUploadDir('public/uploads/home/')
            ->setBasePath('/uploads/home/')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired(false);
        yield IntegerField::new('sortOrder', 'Sort Order');
    }
}
