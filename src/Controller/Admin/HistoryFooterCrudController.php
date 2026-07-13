<?php

namespace App\Controller\Admin;

use App\Entity\HistoryFooter;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class HistoryFooterCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return HistoryFooter::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable(Action::NEW, Action::DELETE);
    }

    public function configureFields(string $pageName): iterable
    {
        yield ImageField::new('logoImage', 'Footer Logo Image')
            ->setBasePath('images')
            ->setUploadDir('public/images')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired(false)
            ->setFormTypeOption('allow_delete', false);

        yield TextField::new('year', 'Large Background Year');
        yield TextField::new('title', 'Heading Title');
        yield TextareaField::new('content', 'Paragraph Content');
        yield TextField::new('subtitle', 'Box Subtitle (e.g. EST.)');
        yield TextField::new('badgeText', 'Box Main Text (e.g. 1992)');
        yield TextField::new('footerTagline', 'Box Highlight Tag (e.g. IT & ENGINEERING)');
    }
}