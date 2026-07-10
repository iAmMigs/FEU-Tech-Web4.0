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
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;

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
        yield ChoiceField::new('icon', 'Card Icon')
            ->hideOnIndex()
            ->setRequired(false)
            ->setHelp('Select the icon shown on the department listing card for this program.')
            ->renderAsNativeWidget()
            ->setChoices([
                '— None —'                      => null,
                'Computer / Chip'               => 'fas fa-microchip',
                'Laptop / Screen'               => 'fas fa-laptop',
                'Code / Development'            => 'fas fa-code',
                'Database'                      => 'fas fa-database',
                'Network / Server'              => 'fas fa-network-wired',
                'Shield / Security'             => 'fas fa-shield-alt',
                'Robot / AI'                    => 'fas fa-robot',
                'Chart / Analytics'             => 'fas fa-chart-bar',
                'Cloud'                         => 'fas fa-cloud',
                'Graduation Cap'                => 'fas fa-graduation-cap',
                'Book / Education'              => 'fas fa-book',
                'Flask / Science'               => 'fas fa-flask',
                'Microscope / Research'         => 'fas fa-microscope',
                'Calculator / Math'             => 'fas fa-calculator',
                'Ruler / Engineering'           => 'fas fa-ruler-combined',
                'Building / Construction'       => 'fas fa-building',
                'Hard Hat / Construction'       => 'fas fa-hard-hat',
                'Wrench / Mechanical'           => 'fas fa-wrench',
                'Cog / Settings'                => 'fas fa-cog',
                'Bolt / Electrical'             => 'fas fa-bolt',
                'Broadcast / Electronics'       => 'fas fa-broadcast-tower',
                'Satellite / Signal'            => 'fas fa-satellite-dish',
                'Bridge / Civil'                => 'fas fa-archway',
                'Globe / International'         => 'fas fa-globe',
                'People / Social Science'       => 'fas fa-users',
                'Comments / Communication'      => 'fas fa-comments',
                'Pen / Writing'                 => 'fas fa-pen-nib',
                'Film / Media'                  => 'fas fa-film',
                'Atom / Physics'                => 'fas fa-atom',
                'Infinity / Mathematics'        => 'fas fa-infinity',
                'Briefcase / Business'          => 'fas fa-briefcase',
                'Stethoscope / Health'          => 'fas fa-stethoscope',
                'Heartbeat / Life Sciences'     => 'fas fa-heartbeat',
                'Leaf / Environment'            => 'fas fa-leaf',
                'Industry / Manufacturing'      => 'fas fa-industry',
                'Drafting Compass / Design'     => 'fas fa-drafting-compass',
                'Tools / Workshop'              => 'fas fa-tools',
                'Magnet / Physics'              => 'fas fa-magnet',
                'Lightbulb / Innovation'        => 'fas fa-lightbulb',
                'Map / Geomatics'               => 'fas fa-map-marked-alt',
                'Puzzle Piece / Systems'        => 'fas fa-puzzle-piece',
                'Palette / Arts'                => 'fas fa-palette',
            ]);

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
