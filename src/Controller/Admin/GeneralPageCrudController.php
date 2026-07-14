<?php

namespace App\Controller\Admin;

use App\Entity\GeneralPages;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;

class GeneralPageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return GeneralPages::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable(Action::NEW, Action::DELETE);
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'General Pages')
            ->setPageTitle('edit', fn (GeneralPages $page) => sprintf('Edit %s Page Content', $page->getPageName()));
    }

    public function configureAssets(Assets $assets): Assets
    {
        return $assets
            ->addCssFile('css/admin_cms.css')
            ->addJsFile('js/admin_cms.js');
    }

    public function configureFields(string $pageName): iterable
    {
        $context = $this->getContext();
        $entity = $context?->getEntity()?->getInstance();
        $currentVideo = $entity instanceof GeneralPages ? $entity->getHeroVideoPath() : null;
        $currentBg = $entity instanceof GeneralPages ? $entity->getCoursesBgImage() : null;

        yield IdField::new('id')->hideOnForm();

        yield FormField::addTab('Page Details');
        yield TextField::new('pageName', 'Page Name')->setDisabled();
        yield TextField::new('slug', 'Slug')->setDisabled()->hideOnIndex();

        yield FormField::addTab('SEO Meta');
        yield TextField::new('metaTitle', 'Meta Title')->hideOnIndex();
        yield TextareaField::new('metaDescription', 'Meta Description')->hideOnIndex();
        yield TextField::new('metaKeywords', 'Meta Keywords')->hideOnIndex();

        yield FormField::addTab('Hero Section');
        yield ImageField::new('heroVideoPath', 'Hero Video/Image File')
            ->setBasePath('/')
            ->setUploadDir('public/uploads/general/')
            ->setUploadedFileNamePattern('uploads/general/[randomhash].[extension]')
            ->setRequired(false)
            ->setHelp($currentVideo ? "Currently used: <code>{$currentVideo}</code>" : "Default video will be used.");
        yield TextField::new('heroTagline', 'Hero Tagline')->hideOnIndex();
        yield TextareaField::new('heroTitle', 'Hero Title')->hideOnIndex();
        yield TextareaField::new('heroDescription', 'Hero Description')->hideOnIndex();
        
        yield FormField::addFieldset('Hero CTA Button 1');
        yield TextField::new('heroBtn1Text', 'Button 1 Text')->hideOnIndex();
        yield TextField::new('heroBtn1Url', 'Button 1 URL')->hideOnIndex();

        yield FormField::addFieldset('Hero CTA Button 2');
        yield TextField::new('heroBtn2Text', 'Button 2 Text')->hideOnIndex();
        yield TextField::new('heroBtn2Url', 'Button 2 URL')->hideOnIndex();

        yield FormField::addFieldset('Hero CTA Button 3');
        yield TextField::new('heroBtn3Text', 'Button 3 Text')->hideOnIndex();
        yield TextField::new('heroBtn3Url', 'Button 3 URL')->hideOnIndex();

        yield FormField::addTab('Colleges Section');
        yield ImageField::new('coursesBgImage', 'Background Image File')
            ->setBasePath('/')
            ->setUploadDir('public/uploads/general/')
            ->setUploadedFileNamePattern('uploads/general/[randomhash].[extension]')
            ->setRequired(false)
            ->setHelp($currentBg ? "Currently used: <code>{$currentBg}</code>" : "Default image will be used.");

        yield FormField::addFieldset('College of Engineering Card');
        yield TextField::new('coeCardTitle', 'Engineering Title')->hideOnIndex();
        yield TextareaField::new('coeCardDescription', 'Engineering Description')->hideOnIndex();
        yield TextField::new('coeCardBtnText', 'Engineering Button Text')->hideOnIndex();
        yield TextField::new('coeCardBtnUrl', 'Engineering Button URL')->hideOnIndex();

        yield FormField::addFieldset('College of Computer Studies Card');
        yield TextField::new('ccsmaCardTitle', 'CCSMA Title')->hideOnIndex();
        yield TextareaField::new('ccsmaCardDescription', 'CCSMA Description')->hideOnIndex();
        yield TextField::new('ccsmaCardBtnText', 'CCSMA Button Text')->hideOnIndex();
        yield TextField::new('ccsmaCardBtnUrl', 'CCSMA Button URL')->hideOnIndex();

        yield FormField::addTab('Accordions Section');
        yield FormField::addFieldset('Accordion 1');
        yield TextField::new('accordion1Title', 'Accordion 1 Title')->hideOnIndex();
        yield TextareaField::new('accordion1Content', 'Accordion 1 Content')->hideOnIndex();

        yield FormField::addFieldset('Accordion 2');
        yield TextField::new('accordion2Title', 'Accordion 2 Title')->hideOnIndex();
        yield TextareaField::new('accordion2Content', 'Accordion 2 Content')->hideOnIndex();

        yield FormField::addFieldset('Accordion 3');
        yield TextField::new('accordion3Title', 'Accordion 3 Title')->hideOnIndex();
        yield TextareaField::new('accordion3Content', 'Accordion 3 Content')->hideOnIndex();

        yield FormField::addFieldset('Accordion 4');
        yield TextField::new('accordion4Title', 'Accordion 4 Title')->hideOnIndex();
        yield TextareaField::new('accordion4Content', 'Accordion 4 Content')->hideOnIndex();
    }
}
