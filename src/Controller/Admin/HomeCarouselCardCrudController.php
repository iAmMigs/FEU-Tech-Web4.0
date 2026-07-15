<?php

namespace App\Controller\Admin;

use App\Entity\HomeCarouselCard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class HomeCarouselCardCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return HomeCarouselCard::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Manage Hero Carousel Cards')
            ->setPageTitle('edit', 'Edit Carousel Card')
            ->setPageTitle('new', 'Add New Carousel Card')
            ->setDefaultSort(['sortOrder' => 'ASC']);
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        yield TextField::new('title', 'Title');
        yield TextField::new('subtitle', 'Subtitle');
        
        yield ImageField::new('logoPath', 'Logo Image')
            ->setBasePath('uploads/carousel/')
            ->setUploadDir('public/uploads/carousel/')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired(false);
            
        yield ImageField::new('cardImagePath', 'Card Overlaid Image')
            ->setBasePath('uploads/carousel/')
            ->setUploadDir('public/uploads/carousel/')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired(false);
            
        yield ImageField::new('heroBgPath', 'Hero Background Image')
            ->setBasePath('uploads/carousel/')
            ->setUploadDir('public/uploads/carousel/')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired(false);
            
        yield IntegerField::new('sortOrder', 'Sort Order');
    }
}