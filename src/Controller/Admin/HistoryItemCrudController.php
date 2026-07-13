<?php

namespace App\Controller\Admin;

use App\Entity\HistoryItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class HistoryItemCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return HistoryItem::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield ImageField::new('iconImage', 'Timeline Icon')
            ->setBasePath('images/history')
            ->setUploadDir('public/images/history')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired($pageName === \EasyCorp\Bundle\EasyAdminBundle\Config\Crud::PAGE_NEW);
        yield TextField::new('year', 'Year');
        yield TextField::new('title', 'Title');
        yield TextareaField::new('content', 'Content');
        yield TextareaField::new('tag', 'Tag/Badge (Optional)')->setRequired(false);
       
    }
}