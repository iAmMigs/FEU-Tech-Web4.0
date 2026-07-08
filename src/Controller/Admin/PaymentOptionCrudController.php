<?php

namespace App\Controller\Admin;

use App\Entity\PaymentOption;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;

class PaymentOptionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PaymentOption::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Payment Options')
            ->setPageTitle('edit', 'Edit Payment Option')
            ->setPageTitle('new', 'Add Payment Option');
    }

    public function configureAssets(Assets $assets): Assets
    {
        return $assets
            ->addCssFile('bundles/easyadmin/field-text-editor.54df6d1e.css')
            ->addJsFile('bundles/easyadmin/field-text-editor.b6c9eb40.js');
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();

        yield FormField::addTab('Basic Info');
        yield TextField::new('name', 'Option Name (e.g. BPI Bills Payment)');
        yield TextField::new('slug', 'Slug (e.g. bpi, gcash)')->setHelp('Used for frontend routing/tabs');
        yield TextField::new('logoText', 'Logo Abbreviation (e.g. BPI, G)');
        yield TextField::new('themeColor', 'Brand Theme Color (e.g. #b11116)');
        yield TextField::new('merchantName', 'Merchant Name (e.g. FEU Institute of Technology)')->hideOnIndex();
        yield BooleanField::new('isActive', 'Active');

        yield FormField::addTab('Reminders & Static Image');
        yield ArrayField::new('importantReminders', 'Important Reminders (Press enter for new item)')
            ->hideOnIndex();
            
        yield ImageField::new('instructionsImage', 'Instructions Image (Optional, for single image guides)')
            ->setBasePath('/')
            ->setUploadDir('public/uploads/payments/')
            ->setUploadedFileNamePattern('uploads/payments/[randomhash].[extension]')
            ->setRequired(false);



        yield FormField::addTab('Sample Computation (e.g. GCash)');
        yield BooleanField::new('showComputation', 'Show Computation Block');
        yield TextField::new('computationFee', 'Base Fee Amount (e.g. 5,000.00)')->hideOnIndex();
        yield TextField::new('computationDivisor', 'Processing Divisor (e.g. 0.985)')->hideOnIndex();
        yield TextField::new('computationTotal', 'Total Charge Amount (e.g. 5,076.15)')->hideOnIndex();
        yield TextField::new('computationProcessingFee', 'Processing Fee Subtitle (e.g. 76.15)')->hideOnIndex();

        yield FormField::addTab('Step-by-Step Guide');
        yield CollectionField::new('steps', 'Payment Steps')
            ->useEntryCrudForm(PaymentStepCrudController::class)
            ->allowAdd()
            ->allowDelete()
            ->setEntryIsComplex(true)
            ->hideOnIndex();
    }
}
