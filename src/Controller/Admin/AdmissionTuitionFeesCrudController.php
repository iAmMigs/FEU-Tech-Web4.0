<?php

namespace App\Controller\Admin;

use App\Entity\AdmissionTuitionFees;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;

class AdmissionTuitionFeesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AdmissionTuitionFees::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable(Action::NEW, Action::DELETE);
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Tuition & Fees Page Content')
            ->setPageTitle('edit', 'Edit Tuition & Fees Page Content');
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();

        yield FormField::addTab('SEO Meta');
        yield TextField::new('metaTitle', 'Meta Title');
        yield TextareaField::new('metaDescription', 'Meta Description');
        yield TextField::new('metaKeywords', 'Meta Keywords');

        yield FormField::addTab('Hero Section');
        yield ImageField::new('heroImage', 'Hero Background Image')
            ->setBasePath('/')
            ->setUploadDir('public/uploads/admissions/')
            ->setUploadedFileNamePattern('uploads/admissions/[randomhash].[extension]')
            ->setRequired(false);
        yield TextField::new('heroTitle', 'Main Title');
        yield TextareaField::new('heroDescription', 'Hero Description');

    }
}
