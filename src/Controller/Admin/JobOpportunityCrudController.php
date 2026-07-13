<?php

namespace App\Controller\Admin;

use App\Entity\JobOpportunity;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class JobOpportunityCrudController extends AbstractCrudController
{
    private ParameterBagInterface $params;

    public function __construct(ParameterBagInterface $params)
    {
        $this->params = $params;
    }

    public static function getEntityFqcn(): string
    {
        return JobOpportunity::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Job Opportunity')
            ->setEntityLabelInPlural('Job Opportunities')
            ->setSearchFields(['title', 'department', 'type']);
    }

    public function configureFields(string $pageName): iterable
    {
        $projectDir = $this->params->get('kernel.project_dir');
        $mascotDir = $projectDir . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'HRO' . DIRECTORY_SEPARATOR . 'HRTAMTAM';
        $posterDir = $projectDir . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'HRO';

        if (!is_dir($mascotDir)) {
            mkdir($mascotDir, 0777, true);
        }
        if (!is_dir($posterDir)) {
            mkdir($posterDir, 0777, true);
        }

        yield IdField::new('id')->hideOnForm();
        yield TextField::new('title', 'Job Title');
        yield TextField::new('department', 'Department');
        
        yield ChoiceField::new('type', 'Job Type')
            ->setChoices([
                'Full Time' => 'Full Time',
                'Part Time' => 'Part Time',
            ]);
            
        yield ImageField::new('mascot', 'Mascot Image File')
            ->setUploadDir('public/images/HRO/HRTAMTAM')
            ->setBasePath('/images/HRO/HRTAMTAM')
            ->setUploadedFileNamePattern('[name]-[randomhash].[extension]')
            ->setRequired($pageName === Crud::PAGE_NEW);
            
        yield ImageField::new('image', 'Official HRO Poster')
            ->setUploadDir('public/images/HRO')
            ->setBasePath('/images/HRO')
            ->setUploadedFileNamePattern('[name]-[randomhash].[extension]')
            ->setRequired(false);

        yield TextareaField::new('qualificationsText', 'Job Qualifications Checklist')
            ->onlyOnForms()
            ->setFormTypeOption('attr', [
                'style' => 'height: 320px; max-height: 550px; overflow-y: auto; resize: vertical;',
                'placeholder' => "Example Layout:\nMust have a Bachelor's Degree\nAt least 2 years of industry experience\nStrong analytical skills"
            ]);
    }
}