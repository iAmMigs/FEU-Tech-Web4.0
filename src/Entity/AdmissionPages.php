<?php

namespace App\Entity;

use App\Repository\AdmissionPagesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdmissionPagesRepository::class)]
class AdmissionPages
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $pageName = null;

    #[ORM\Column(length: 255, unique: true)]
    private ?string $slug = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $metaTitle = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $metaDescription = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $metaKeywords = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $heroImage = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $heroTitle = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $procedureSubtitle = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $procedureTitle = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $procedureDescription = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $step1Title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $step1Description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $step1LinkUrl = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $step2Title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $step2Description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $step2LinkUrl = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $step3Title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $step3Description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $step3Email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $requirementsSubtitle = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $requirementsTitle = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $requirement1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $requirement2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $requirement3 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $requirement4 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $requirement5 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $enrollmentSubtitle = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $enrollmentDescription = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $proofSubtitle = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $proofDescription = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $proofEmail = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $enrollmentFooter = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nextStepsBadge = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nextStepsTitle = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $nextStepsDescription = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $credential1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $credential2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $credential3 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $step4Title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $step4Description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $step4LinkUrl = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $requirement6 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $requirement7 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $requirement8 = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPageName(): ?string
    {
        return $this->pageName;
    }

    public function setPageName(string $pageName): static
    {
        $this->pageName = $pageName;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getMetaTitle(): ?string { return $this->metaTitle; }
    public function setMetaTitle(?string $metaTitle): static { $this->metaTitle = $metaTitle; return $this; }

    public function getMetaDescription(): ?string { return $this->metaDescription; }
    public function setMetaDescription(?string $metaDescription): static { $this->metaDescription = $metaDescription; return $this; }

    public function getMetaKeywords(): ?string { return $this->metaKeywords; }
    public function setMetaKeywords(?string $metaKeywords): static { $this->metaKeywords = $metaKeywords; return $this; }

    public function getHeroImage(): ?string { return $this->heroImage; }
    public function setHeroImage(?string $heroImage): static { $this->heroImage = $heroImage; return $this; }

    public function getHeroTitle(): ?string { return $this->heroTitle; }
    public function setHeroTitle(?string $heroTitle): static { $this->heroTitle = $heroTitle; return $this; }

    public function getProcedureSubtitle(): ?string { return $this->procedureSubtitle; }
    public function setProcedureSubtitle(?string $procedureSubtitle): static { $this->procedureSubtitle = $procedureSubtitle; return $this; }

    public function getProcedureTitle(): ?string { return $this->procedureTitle; }
    public function setProcedureTitle(?string $procedureTitle): static { $this->procedureTitle = $procedureTitle; return $this; }

    public function getProcedureDescription(): ?string { return $this->procedureDescription; }
    public function setProcedureDescription(?string $procedureDescription): static { $this->procedureDescription = $procedureDescription; return $this; }

    public function getStep1Title(): ?string { return $this->step1Title; }
    public function setStep1Title(?string $step1Title): static { $this->step1Title = $step1Title; return $this; }

    public function getStep1Description(): ?string { return $this->step1Description; }
    public function setStep1Description(?string $step1Description): static { $this->step1Description = $step1Description; return $this; }

    public function getStep1LinkUrl(): ?string { return $this->step1LinkUrl; }
    public function setStep1LinkUrl(?string $step1LinkUrl): static { $this->step1LinkUrl = $step1LinkUrl; return $this; }

    public function getStep2Title(): ?string { return $this->step2Title; }
    public function setStep2Title(?string $step2Title): static { $this->step2Title = $step2Title; return $this; }

    public function getStep2Description(): ?string { return $this->step2Description; }
    public function setStep2Description(?string $step2Description): static { $this->step2Description = $step2Description; return $this; }

    public function getStep2LinkUrl(): ?string { return $this->step2LinkUrl; }
    public function setStep2LinkUrl(?string $step2LinkUrl): static { $this->step2LinkUrl = $step2LinkUrl; return $this; }

    public function getStep3Title(): ?string { return $this->step3Title; }
    public function setStep3Title(?string $step3Title): static { $this->step3Title = $step3Title; return $this; }

    public function getStep3Description(): ?string { return $this->step3Description; }
    public function setStep3Description(?string $step3Description): static { $this->step3Description = $step3Description; return $this; }

    public function getStep3Email(): ?string { return $this->step3Email; }
    public function setStep3Email(?string $step3Email): static { $this->step3Email = $step3Email; return $this; }

    public function getRequirementsSubtitle(): ?string { return $this->requirementsSubtitle; }
    public function setRequirementsSubtitle(?string $requirementsSubtitle): static { $this->requirementsSubtitle = $requirementsSubtitle; return $this; }

    public function getRequirementsTitle(): ?string { return $this->requirementsTitle; }
    public function setRequirementsTitle(?string $requirementsTitle): static { $this->requirementsTitle = $requirementsTitle; return $this; }

    public function getRequirement1(): ?string { return $this->requirement1; }
    public function setRequirement1(?string $requirement1): static { $this->requirement1 = $requirement1; return $this; }

    public function getRequirement2(): ?string { return $this->requirement2; }
    public function setRequirement2(?string $requirement2): static { $this->requirement2 = $requirement2; return $this; }

    public function getRequirement3(): ?string { return $this->requirement3; }
    public function setRequirement3(?string $requirement3): static { $this->requirement3 = $requirement3; return $this; }

    public function getRequirement4(): ?string { return $this->requirement4; }
    public function setRequirement4(?string $requirement4): static { $this->requirement4 = $requirement4; return $this; }

    public function getRequirement5(): ?string { return $this->requirement5; }
    public function setRequirement5(?string $requirement5): static { $this->requirement5 = $requirement5; return $this; }

    public function getEnrollmentSubtitle(): ?string { return $this->enrollmentSubtitle; }
    public function setEnrollmentSubtitle(?string $enrollmentSubtitle): static { $this->enrollmentSubtitle = $enrollmentSubtitle; return $this; }

    public function getEnrollmentDescription(): ?string { return $this->enrollmentDescription; }
    public function setEnrollmentDescription(?string $enrollmentDescription): static { $this->enrollmentDescription = $enrollmentDescription; return $this; }

    public function getProofSubtitle(): ?string { return $this->proofSubtitle; }
    public function setProofSubtitle(?string $proofSubtitle): static { $this->proofSubtitle = $proofSubtitle; return $this; }

    public function getProofDescription(): ?string { return $this->proofDescription; }
    public function setProofDescription(?string $proofDescription): static { $this->proofDescription = $proofDescription; return $this; }

    public function getProofEmail(): ?string { return $this->proofEmail; }
    public function setProofEmail(?string $proofEmail): static { $this->proofEmail = $proofEmail; return $this; }

    public function getEnrollmentFooter(): ?string { return $this->enrollmentFooter; }
    public function setEnrollmentFooter(?string $enrollmentFooter): static { $this->enrollmentFooter = $enrollmentFooter; return $this; }

    public function getNextStepsBadge(): ?string { return $this->nextStepsBadge; }
    public function setNextStepsBadge(?string $nextStepsBadge): static { $this->nextStepsBadge = $nextStepsBadge; return $this; }

    public function getNextStepsTitle(): ?string { return $this->nextStepsTitle; }
    public function setNextStepsTitle(?string $nextStepsTitle): static { $this->nextStepsTitle = $nextStepsTitle; return $this; }

    public function getNextStepsDescription(): ?string { return $this->nextStepsDescription; }
    public function setNextStepsDescription(?string $nextStepsDescription): static { $this->nextStepsDescription = $nextStepsDescription; return $this; }

    public function getCredential1(): ?string { return $this->credential1; }
    public function setCredential1(?string $credential1): static { $this->credential1 = $credential1; return $this; }

    public function getCredential2(): ?string { return $this->credential2; }
    public function setCredential2(?string $credential2): static { $this->credential2 = $credential2; return $this; }

    public function getCredential3(): ?string { return $this->credential3; }
    public function setCredential3(?string $credential3): static { $this->credential3 = $credential3; return $this; }

    public function getStep4Title(): ?string { return $this->step4Title; }
    public function setStep4Title(?string $step4Title): static { $this->step4Title = $step4Title; return $this; }

    public function getStep4Description(): ?string { return $this->step4Description; }
    public function setStep4Description(?string $step4Description): static { $this->step4Description = $step4Description; return $this; }

    public function getStep4LinkUrl(): ?string { return $this->step4LinkUrl; }
    public function setStep4LinkUrl(?string $step4LinkUrl): static { $this->step4LinkUrl = $step4LinkUrl; return $this; }

    public function getRequirement6(): ?string { return $this->requirement6; }
    public function setRequirement6(?string $requirement6): static { $this->requirement6 = $requirement6; return $this; }

    public function getRequirement7(): ?string { return $this->requirement7; }
    public function setRequirement7(?string $requirement7): static { $this->requirement7 = $requirement7; return $this; }

    public function getRequirement8(): ?string { return $this->requirement8; }
    public function setRequirement8(?string $requirement8): static { $this->requirement8 = $requirement8; return $this; }
}
