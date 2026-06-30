<?php

namespace App\Controller\Admin;

use App\Entity\SiteSettings;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;

class SiteSettingsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SiteSettings::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable(Action::DELETE);
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Site Settings')
            ->setPageTitle('edit', 'Edit Site Settings')
            ->setPageTitle('new', 'Create Site Settings (Only one should exist)');
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        
        yield BooleanField::new('isCookieBannerEnabled', 'Enable Cookie Banner');
        yield TextField::new('cookieButtonText', 'Cookie Button Text')->setHelp('e.g., "Accept", "Got it!"');
        yield TextareaField::new('cookieMessage', 'Cookie Consent Message')->setHelp('The text that will appear in the cookie popup.');
    }
}
