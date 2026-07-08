<?php

namespace App\Controller\Admin;

use App\Entity\AcademicsProgram;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class AcademicsProgramCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AcademicsProgram::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Academics Programs')
            ->setPageTitle('edit', fn (AcademicsProgram $prog) => sprintf('Edit %s Program Content', $prog->getProgramName()));
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();

        yield FormField::addTab('Basic Details');
        yield TextField::new('programName', 'Program Name (e.g. Bachelor of Science in Civil Engineering)');
        yield TextField::new('slug', 'Slug (e.g. bscs)')->hideOnIndex();
        yield AssociationField::new('department', 'Department');

        yield FormField::addTab('SEO Meta');
        yield TextField::new('metaTitle', 'Meta Title')->onlyOnForms();
        yield TextareaField::new('metaDescription', 'Meta Description')->onlyOnForms();
        yield TextField::new('metaKeywords', 'Meta Keywords')->onlyOnForms();

        yield FormField::addTab('Hero Section');
        yield ImageField::new('heroImage', 'Hero Header Image')
            ->setBasePath('/uploads/academics/')
            ->setUploadDir('public/uploads/academics/')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired(false)
            ->onlyOnForms();

        yield FormField::addTab('Overview');
        yield TextField::new('overviewTitle', 'Overview Section Title')->onlyOnForms();
        yield TextEditorField::new('overviewDescription', 'Overview Paragraphs')->onlyOnForms();

        yield FormField::addTab('Objectives');
        yield TextField::new('objectivesTitle', 'Objectives Section Title')->onlyOnForms();
        yield TextEditorField::new('objectivesDescription', 'Objectives Paragraphs/Intro')->onlyOnForms();

        yield FormField::addTab('Outcomes');
        yield TextField::new('outcomesTitle', 'Outcomes Section Title')->onlyOnForms();
        yield TextEditorField::new('outcomesDescription', 'Outcomes Intro')->onlyOnForms();
        yield TextEditorField::new('studentOutcomes', 'Student Outcomes (Formatted List)')->onlyOnForms();

        yield FormField::addTab('Graduate Attributes');
        yield TextField::new('attributesTitle', 'Attributes Section Title')->onlyOnForms();
        yield TextEditorField::new('graduateAttributes', 'Graduate Attributes (Formatted List)')->onlyOnForms();

        yield FormField::addTab('Careers');
        yield TextField::new('careersTitle', 'Careers Section Title')->onlyOnForms();
        yield TextEditorField::new('careersDescription', 'Careers Intro')->onlyOnForms();
        yield TextEditorField::new('careerOpportunities', 'Career Opportunities (Formatted List)')->onlyOnForms();

        yield FormField::addTab('Skills Section');
        yield TextField::new('skillsTitle', 'Skills Section Title')->onlyOnForms();
        yield TextField::new('softSkillsTitle', 'Soft Skills Subtitle')->onlyOnForms();
        yield TextEditorField::new('softSkills', 'Soft Skills (Formatted List)')->onlyOnForms();
        yield TextField::new('technicalSkillsTitle', 'Technical Skills Subtitle')->onlyOnForms();
        yield TextEditorField::new('technicalSkills', 'Technical Skills (Formatted List)')->onlyOnForms();

        yield FormField::addTab('Contact Info');
        yield TextField::new('contactTitle', 'Contact Section Title')->onlyOnForms();
        yield TextEditorField::new('contactDescription', 'Contact Description')->onlyOnForms();
        yield TextField::new('contactEmail', 'Contact Email')->onlyOnForms();
        yield TextField::new('contactPhone', 'Contact Phone')->onlyOnForms();
    }
}
