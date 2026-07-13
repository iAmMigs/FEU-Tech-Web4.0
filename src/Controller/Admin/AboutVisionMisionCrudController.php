<?php

namespace App\Controller\Admin;

use App\Entity\AboutVisionMision;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;  
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions; 
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;

class AboutVisionMisionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AboutVisionMision::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable(Action::NEW, Action::DELETE);
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        yield TextField::new('heroTitle', 'Hero Title Main');
        yield TextField::new('heroTitleHighlight', 'Hero Title Highlighted');
        yield TextareaField::new('heroDescription', 'Hero Description');
        
        yield TextField::new('titleOne', 'Title 1');
        yield TextareaField::new('titleOneText', 'Title 1 Text');
        
        yield TextField::new('titleTwo', 'Title 2');
        yield TextareaField::new('titleTwoText', 'Title 2 Text');
        
        yield TextField::new('titleThree', 'Title 3');
        yield TextareaField::new('titleThreeText', 'Title 3 Text');
        yield ArrayField::new('titleThreeCommitments', 'Title 3 Commitments List');
    }
}