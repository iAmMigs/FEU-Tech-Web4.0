<?php

namespace App\Controller\Admin;

use App\Entity\StudentJourneySpecialSoOrganization;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;

class StudentJourneySpecialSoOrganizationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return StudentJourneySpecialSoOrganization::class;
    }


    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Special Interest Organizations')
            ->setPageTitle('edit', 'Modify Special Interest Profile');
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        yield TextField::new('name', 'Special Interest Name');
        yield TextareaField::new('description', 'Organization Purpose Description');
        
        yield ChoiceField::new('colorTheme', 'Theme Color Palette')
            ->setChoices([
                'Purple' => 'purple',
                'Blue' => 'blue',
                'Yellow' => 'yellow',
                'Red' => 'red',
                'Green ' => 'green',
                'Cyan' => 'cyan',
            ]);
    }
}