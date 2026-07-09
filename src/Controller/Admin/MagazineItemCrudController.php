<?php

namespace App\Controller\Admin;

use App\Entity\MagazineItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class MagazineItemCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MagazineItem::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Manage Magazines')
            ->setPageTitle('edit', 'Edit Magazine Cover')
            ->setPageTitle('new', 'Add New Magazine Cover')
            ->setDefaultSort(['sortOrder' => 'ASC']);
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        yield ImageField::new('imagePath', 'Cover Image')
            ->setBasePath('/')
            ->setUploadDir('public/uploads/magazines/')
            ->setUploadedFileNamePattern('uploads/magazines/[randomhash].[extension]')
            ->setRequired(false);
        yield TextField::new('linkUrl', 'Google Drive / Flipbook Link');
        yield IntegerField::new('sortOrder', 'Sort Order');
    }
}
