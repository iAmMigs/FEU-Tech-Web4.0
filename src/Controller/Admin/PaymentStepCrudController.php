<?php

namespace App\Controller\Admin;

use App\Entity\PaymentStep;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class PaymentStepCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PaymentStep::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Payment Steps')
            ->setPageTitle('edit', 'Edit Payment Step')
            ->setPageTitle('new', 'Add Payment Step')
            ->setDefaultSort(['paymentOption' => 'ASC', 'stepNumber' => 'ASC']);
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        yield AssociationField::new('paymentOption', 'Payment Option')->hideOnForm();
        yield IntegerField::new('stepNumber', 'Step Number');
        yield TextField::new('title', 'Step Title');
        yield TextEditorField::new('description', 'Step Description')->hideOnIndex();
        yield ImageField::new('image', 'Step Image')
            ->setBasePath('/')
            ->setUploadDir('public/uploads/payments/')
            ->setUploadedFileNamePattern('uploads/payments/[randomhash].[extension]')
            ->setRequired(false);
    }
}
