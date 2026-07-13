<?php

namespace App\Controller\Admin;

use App\Entity\AboutFacilitiesTab;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class AboutFacilitiesTabCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AboutFacilitiesTab::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield IntegerField::new('sortOrder', 'Nav Drop Placement Sort Weight Metric Order');
        yield TextField::new('navTitle', 'Navigation Selector Main Label');
        yield TextField::new('navSubtitle', 'Navigation Description Substring');
        yield TextField::new('contentBadge', 'Interior Slider Category Ribbon Tag');
        yield TextField::new('contentTitle', 'Interior Slider Dynamic Title Banner');
        yield TextareaField::new('descriptionMarkdown', 'Detailed Multi-Paragraph Block')->setNumOfRows(6);

        $imgPattern = '[randomhash].[extension]';
        $baseDir = 'images/facility';
        $uploadDir = 'public/images/facility';

        yield ImageField::new('imgOne', 'Showcase Image Slide 1')->setBasePath($baseDir)->setUploadDir($uploadDir)->setUploadedFileNamePattern($imgPattern)->setRequired($pageName === Crud::PAGE_NEW);
        yield ImageField::new('imgTwo', 'Showcase Image Slide 2')->setBasePath($baseDir)->setUploadDir($uploadDir)->setUploadedFileNamePattern($imgPattern)->setRequired($pageName === Crud::PAGE_NEW);
        yield ImageField::new('imgThree', 'Showcase Image Slide 3')->setBasePath($baseDir)->setUploadDir($uploadDir)->setUploadedFileNamePattern($imgPattern)->setRequired($pageName === Crud::PAGE_NEW);

        yield TextField::new('statOneTitle', 'Card Stat Metric 1 Headline');
        yield TextField::new('statOneDesc', 'Card Stat Metric 1 Text Context');
        yield TextField::new('statTwoTitle', 'Card Stat Metric 2 Headline');
        yield TextField::new('statTwoDesc', 'Card Stat Metric 2 Text Context');
        yield TextField::new('statThreeTitle', 'Card Stat Metric 3 Headline');
        yield TextField::new('statThreeDesc', 'Card Stat Metric 3 Text Context');
    }
}