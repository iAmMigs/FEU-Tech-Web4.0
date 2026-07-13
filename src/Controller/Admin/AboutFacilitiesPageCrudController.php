<?php

namespace App\Controller\Admin;

use App\Entity\AboutFacilitiesPage;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
// 1. Change your import from ImageField to FileField
use EasyCorp\Bundle\EasyAdminBundle\Field\FileField; 

class AboutFacilitiesPageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AboutFacilitiesPage::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('heroTag', 'Hero Pill Ribbon Text');
        yield TextField::new('heroTitleWhite', 'Hero White Heading Text Line');
        yield TextField::new('heroTitleYellow', 'Hero Yellow Accent Heading Line');
        yield TextareaField::new('heroDescription', 'Hero Content Body Descriptor Block')->setNumOfRows(4);
        yield TextField::new('tourBadge', 'Video Section Header Banner Text');
        
        yield FileField::new('videoPath', 'Virtual Tour Video MP4 Asset File')
            ->setBasePath('images/facility')
            ->setUploadDir('public/images/facility')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setFormTypeOption('attr', ['accept' => 'video/mp4,video/*']) 
            ->setRequired($pageName === Crud::PAGE_NEW);
    }
}