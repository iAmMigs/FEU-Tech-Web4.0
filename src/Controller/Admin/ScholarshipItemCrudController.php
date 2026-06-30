<?php

namespace App\Controller\Admin;

use App\Entity\ScholarshipItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;

class ScholarshipItemCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ScholarshipItem::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Manage Scholarships')
            ->setPageTitle('edit', 'Edit Scholarship Details')
            ->setPageTitle('new', 'Add New Scholarship');
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        yield TextField::new('title', 'Scholarship Title');
        yield TextField::new('coverage', 'Coverage / Subtitle');
        
        yield ChoiceField::new('category', 'Category')
            ->setChoices([
                'Academic Excellence' => 'Academic Excellence',
                'Industry Partners' => 'Industry Partners',
                'Other Grants' => 'Other Grants',
            ]);

        yield ArrayField::new('requirements', 'Requirements (Press enter for new item)')
            ->hideOnIndex();
    }
}
