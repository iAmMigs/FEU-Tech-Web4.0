<?php

namespace App\Controller\Admin;

use App\Entity\FaqItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;

class FaqItemCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return FaqItem::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Manage FAQ Items')
            ->setPageTitle('edit', 'Edit FAQ Item')
            ->setPageTitle('new', 'Add New FAQ Item');
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        yield TextField::new('question', 'Question');
        yield TextareaField::new('answer', 'Answer');
        
        yield ChoiceField::new('category', 'Category')
            ->setChoices([
                'Admissions' => 'admissions',
                'Financials & Scholarships' => 'financials',
                'Academics' => 'academics',
            ]);
    }
}
