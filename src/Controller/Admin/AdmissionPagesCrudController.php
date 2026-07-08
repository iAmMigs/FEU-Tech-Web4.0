<?php

namespace App\Controller\Admin;

use App\Entity\AdmissionPages;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

class AdmissionPagesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AdmissionPages::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable(Action::NEW, Action::DELETE);
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Admissions Pages')
            ->setPageTitle('edit', fn (AdmissionPages $page) => sprintf('Edit %s Page Content', $page->getPageName()));
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();

        yield FormField::addTab('Page Details');
        yield TextField::new('pageName', 'Page Name')->setDisabled();
        yield TextField::new('slug', 'Slug')->setDisabled()->hideOnIndex();

        yield FormField::addTab('SEO Meta');
        yield TextField::new('metaTitle', 'Meta Title');
        yield TextareaField::new('metaDescription', 'Meta Description');
        yield TextField::new('metaKeywords', 'Meta Keywords');

        yield FormField::addTab('Hero Section');
        yield ImageField::new('heroImage', 'Hero Background Image')
            ->setBasePath('/')
            ->setUploadDir('public/uploads/admissions/')
            ->setUploadedFileNamePattern('uploads/admissions/[randomhash].[extension]')
            ->setRequired(false);
        yield TextField::new('heroTitle', 'Main Title');

        yield FormField::addTab('Procedures');
        yield TextField::new('procedureSubtitle', 'Section Subtitle');
        yield TextField::new('procedureTitle', 'Section Title');
        yield TextEditorField::new('procedureDescription', 'Section Description');
        
        yield FormField::addFieldset('Step 1');
        yield TextField::new('step1Title', 'Step 1 Title');
        yield TextEditorField::new('step1Description', 'Step 1 Description');
        yield TextField::new('step1LinkUrl', 'Step 1 Link URL');

        yield FormField::addFieldset('Step 2');
        yield TextField::new('step2Title', 'Step 2 Title');
        yield TextEditorField::new('step2Description', 'Step 2 Description');
        yield TextField::new('step2LinkUrl', 'Step 2 Link URL');

        yield FormField::addFieldset('Step 3');
        yield TextField::new('step3Title', 'Step 3 Title');
        yield TextEditorField::new('step3Description', 'Step 3 Description');
        yield TextField::new('step3Email', 'Step 3 Email Contact');

        yield FormField::addFieldset('Step 4');
        yield TextField::new('step4Title', 'Step 4 Title');
        yield TextEditorField::new('step4Description', 'Step 4 Description');
        yield TextField::new('step4LinkUrl', 'Step 4 Link URL');

        yield FormField::addTab('Requirements');
        yield TextField::new('requirementsSubtitle', 'Section Subtitle');
        yield TextField::new('requirementsTitle', 'Section Title');
        yield TextField::new('requirement1', 'Requirement Item 1');
        yield TextField::new('requirement2', 'Requirement Item 2');
        yield TextField::new('requirement3', 'Requirement Item 3');
        yield TextField::new('requirement4', 'Requirement Item 4');
        yield TextField::new('requirement5', 'Requirement Item 5');
        yield TextField::new('requirement6', 'Requirement Item 6');
        yield TextField::new('requirement7', 'Requirement Item 7');
        yield TextField::new('requirement8', 'Requirement Item 8');

        yield FormField::addTab('Enrollment');
        yield FormField::addFieldset('Payment Setup');
        yield TextField::new('enrollmentSubtitle', 'Payment Subtitle');
        yield TextEditorField::new('enrollmentDescription', 'Payment Description');

        yield FormField::addFieldset('Proof of Payment');
        yield TextField::new('proofSubtitle', 'Proof Subtitle');
        yield TextField::new('proofDescription', 'Proof Description');
        yield TextField::new('proofEmail', 'Proof Contact Email');
        
        yield FormField::addFieldset('Footer Note');
        yield TextEditorField::new('enrollmentFooter', 'Enrollment Footer Text');

        yield FormField::addTab('Next Steps (Credentials)');
        yield TextField::new('nextStepsBadge', 'Small Badge Text');
        yield TextField::new('nextStepsTitle', 'Main Title');
        yield TextEditorField::new('nextStepsDescription', 'Description');
        yield TextField::new('credential1', 'Credential 1 Title');
        yield TextField::new('credential2', 'Credential 2 Title');
        yield TextField::new('credential3', 'Credential 3 Title');
    }
}
