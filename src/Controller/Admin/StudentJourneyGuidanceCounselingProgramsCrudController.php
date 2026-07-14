<?php

namespace App\Controller\Admin;

use App\Entity\StudentJourneyGuidanceCounselingPrograms;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use Doctrine\ORM\EntityManagerInterface;

class StudentJourneyGuidanceCounselingProgramsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return StudentJourneyGuidanceCounselingPrograms::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Guidance Dynamic Blocks')
            ->setPageTitle('new', 'Create Program or Core Service Grid Element')
            ->setPageTitle('edit', 'Edit Dynamic Layout Configuration');
    }

    public function configureAssets(Assets $assets): Assets
    {
        return $assets->addHtmlContentToBody('
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const categoryDropdown = document.querySelector(\'select[name$="[category]"]\');
                    const iconFieldWrapper = document.querySelector(\'[id$="_iconChoice"]\')?.closest(\'.form-group, .field-choice\');

                    if (!categoryDropdown || !iconFieldWrapper) return;

                    function toggleIconField() {
                        if (categoryDropdown.value === "core_service") {
                            iconFieldWrapper.style.display = "none";
                        } else {
                            iconFieldWrapper.style.display = "block";
                        }
                    }

                    toggleIconField();

                    categoryDropdown.addEventListener("change", toggleIconField);
                });
            </script>
        ');
    }


    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $this->enforceCoreServiceIcon($entityInstance);
        parent::persistEntity($entityManager, $entityInstance);
    }

    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $this->enforceCoreServiceIcon($entityInstance);
        parent::updateEntity($entityManager, $entityInstance);
    }

    private function enforceCoreServiceIcon($entityInstance): void
    {
        if ($entityInstance instanceof StudentJourneyGuidanceCounselingPrograms) {
            if ($entityInstance->getCategory() === 'core_service') {
                $entityInstance->setIconChoice('check');
            }
        }
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        
        yield ChoiceField::new('category', 'Element Assignment Section')
            ->setChoices([
                'Programs & Activities Section' => 'program',
                'Core Services Section' => 'core_service'
            ]);

        yield TextField::new('title', 'Display Title text');
        yield TextareaField::new('description', 'Short Card Context Details');

        yield ChoiceField::new('iconChoice', 'Vector Icon Indicator Emblem')
            ->setChoices([
                'Open Book Icon' => 'book',
                'Heart Icon' => 'heart',
                'Multiple Users Team Icon' => 'users',
                'Clipboard Test Checksheet' => 'clipboard',
                'Phone Contact Handle' => 'phone',
                'Green Success Check Mark' => 'check',
                'Standard Shiny Star Rating' => 'star',
            ])
            ->setHelp('Visual icon rendered on top of the contextual layout boxes.');
    }
}