<?php

namespace App\Controller\Admin;

use App\Entity\JobCareers;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;

class JobCareersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return JobCareers::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Careers Page Text')
            ->setEntityLabelInPlural('Careers Page Text Content')
            ->setPageTitle(Crud::PAGE_INDEX, 'Edit Careers Landing Page Copy');
    }

    public function configureActions(Actions $actions): Actions
    {
        // Safe-guard the frontend layout structure by removing creation/deletion capabilities
        return $actions
            ->disable(Action::NEW, Action::DELETE, Action::DETAIL);
    }

   public function configureFields(string $pageName): iterable
    {
        yield TextField::new('label', 'Section Location Target')
            ->setFormTypeOption('disabled', true);

        if ($pageName === Crud::PAGE_INDEX) {
            yield TextField::new('value', 'Current Display Text');
        } else {
            yield TextareaField::new('value', 'Update Display Text Content')
                ->setFormTypeOption('attr', [
                    'rows' => 4,
                    'style' => 'resize: vertical;'
                ]);
        }
    }
}