<?php

namespace App\Controller\Admin;

use App\Entity\StudentJourneyIcareServices;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;

class StudentJourneyIcareServicesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return StudentJourneyIcareServices::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Dynamic Academic Services Grid')
            ->setPageTitle('new', 'Add Dynamic Card Element')
            ->setPageTitle('edit', 'Update Component Block Values');
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        yield TextField::new('title', 'Card Program Title text');
        yield TextareaField::new('description', 'Contextual Services Inner Text Content');
        
        yield ChoiceField::new('iconChoice', 'Vector Visual Grid Symbol Selector')
            ->setChoices([
                'Consultation Session Bubble Icon' => 'chat',
                'Open Resource Book Icon' => 'book',
                'Clipboard Checksheet Grid Badge' => 'clipboard',
                'Multiple Connected Users/Peers Icon' => 'users',
                'Heart Icon' => 'heart',
                'Phone Handle Icon' => 'phone',
            ])
            ->setHelp('Defines the SVG path element rendered when drawing the layout box context header.');
    }
}