<?php

namespace App\Controller\Admin;

use App\Entity\AboutOffice;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;

class AboutOfficeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AboutOffice::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        yield TextField::new('navLabel', 'Dropdown Abbreviation Tag (e.g., AERO)');
        yield SlugField::new('slug', 'URL Custom Path Slug')->setTargetFieldName('navLabel');
        yield TextField::new('officeTitle', 'Full Official Office Name');
        yield TextareaField::new('officeSubtitle', 'Office Subtitle / Tagline (e.g., Academic Services)');
        yield TextField::new('overviewTitle', 'Intro Headline Segment');
        yield TextareaField::new('overviewInfo', 'Overview Information Copy (Supports Line Breaks)')->setNumOfRows(8); 
        yield TextField::new('officeLocation', 'Physical Desk Office / Room Placement');
        yield TextField::new('officeContact', 'Trunkline Extension Contacts');
        yield EmailField::new('officeEmail', 'Email Address')->setRequired(false);
        yield TextareaField::new('officeInfo', 'Footer Context Notification Text Block')->setNumOfRows(3); 
    }
}