<?php

namespace App\Entity;

use App\Repository\AcademicsProgramRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AcademicsProgramRepository::class)]
class AcademicsProgram
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $programName = null;

    #[ORM\Column(length: 255, unique: true)]
    private ?string $slug = null;

    #[ORM\ManyToOne(inversedBy: 'programs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?AcademicsDepartment $department = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $heroImage = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $overviewTitle = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $overviewDescription = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $objectivesTitle = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $objectivesDescription = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $outcomesTitle = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $outcomesDescription = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $studentOutcomes = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $attributesTitle = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $graduateAttributes = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $careersTitle = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $careersDescription = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $careerOpportunities = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $skillsTitle = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $softSkillsTitle = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $softSkills = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $technicalSkillsTitle = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $technicalSkills = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $contactTitle = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $contactDescription = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $contactEmail = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $contactPhone = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $metaTitle = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $metaDescription = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $metaKeywords = null;

    #[ORM\OneToMany(mappedBy: 'program', targetEntity: ProgramFaculty::class, orphanRemoval: true)]
    private Collection $faculty;

    #[ORM\OneToMany(mappedBy: 'program', targetEntity: ProgramLaboratory::class, orphanRemoval: true)]
    private Collection $laboratories;

    #[ORM\OneToMany(mappedBy: 'program', targetEntity: ProgramSpecialization::class, orphanRemoval: true)]
    private Collection $specializations;

    public function __construct()
    {
        $this->faculty = new ArrayCollection();
        $this->laboratories = new ArrayCollection();
        $this->specializations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProgramName(): ?string
    {
        return $this->programName;
    }

    public function setProgramName(string $programName): static
    {
        $this->programName = $programName;
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

    public function getDepartment(): ?AcademicsDepartment
    {
        return $this->department;
    }

    public function setDepartment(?AcademicsDepartment $department): static
    {
        $this->department = $department;
        return $this;
    }

    public function getHeroImage(): ?string
    {
        return $this->heroImage;
    }

    public function setHeroImage(?string $heroImage): static
    {
        $this->heroImage = $heroImage;
        return $this;
    }

    public function getOverviewTitle(): ?string
    {
        return $this->overviewTitle;
    }

    public function setOverviewTitle(?string $overviewTitle): static
    {
        $this->overviewTitle = $overviewTitle;
        return $this;
    }

    public function getOverviewDescription(): ?string
    {
        return $this->overviewDescription;
    }

    public function setOverviewDescription(?string $overviewDescription): static
    {
        $this->overviewDescription = $overviewDescription;
        return $this;
    }

    public function getObjectivesTitle(): ?string
    {
        return $this->objectivesTitle;
    }

    public function setObjectivesTitle(?string $objectivesTitle): static
    {
        $this->objectivesTitle = $objectivesTitle;
        return $this;
    }

    public function getObjectivesDescription(): ?string
    {
        return $this->objectivesDescription;
    }

    public function setObjectivesDescription(?string $objectivesDescription): static
    {
        $this->objectivesDescription = $objectivesDescription;
        return $this;
    }

    public function getOutcomesTitle(): ?string
    {
        return $this->outcomesTitle;
    }

    public function setOutcomesTitle(?string $outcomesTitle): static
    {
        $this->outcomesTitle = $outcomesTitle;
        return $this;
    }

    public function getOutcomesDescription(): ?string
    {
        return $this->outcomesDescription;
    }

    public function setOutcomesDescription(?string $outcomesDescription): static
    {
        $this->outcomesDescription = $outcomesDescription;
        return $this;
    }

    public function getStudentOutcomes(): ?string
    {
        return $this->studentOutcomes;
    }

    public function setStudentOutcomes(?string $studentOutcomes): static
    {
        $this->studentOutcomes = $studentOutcomes;
        return $this;
    }

    public function getAttributesTitle(): ?string
    {
        return $this->attributesTitle;
    }

    public function setAttributesTitle(?string $attributesTitle): static
    {
        $this->attributesTitle = $attributesTitle;
        return $this;
    }

    public function getGraduateAttributes(): ?string
    {
        return $this->graduateAttributes;
    }

    public function setGraduateAttributes(?string $graduateAttributes): static
    {
        $this->graduateAttributes = $graduateAttributes;
        return $this;
    }

    public function getCareersTitle(): ?string
    {
        return $this->careersTitle;
    }

    public function setCareersTitle(?string $careersTitle): static
    {
        $this->careersTitle = $careersTitle;
        return $this;
    }

    public function getCareersDescription(): ?string
    {
        return $this->careersDescription;
    }

    public function setCareersDescription(?string $careersDescription): static
    {
        $this->careersDescription = $careersDescription;
        return $this;
    }

    public function getCareerOpportunities(): ?string
    {
        return $this->careerOpportunities;
    }

    public function setCareerOpportunities(?string $careerOpportunities): static
    {
        $this->careerOpportunities = $careerOpportunities;
        return $this;
    }

    public function getSkillsTitle(): ?string
    {
        return $this->skillsTitle;
    }

    public function setSkillsTitle(?string $skillsTitle): static
    {
        $this->skillsTitle = $skillsTitle;
        return $this;
    }

    public function getSoftSkillsTitle(): ?string
    {
        return $this->softSkillsTitle;
    }

    public function setSoftSkillsTitle(?string $softSkillsTitle): static
    {
        $this->softSkillsTitle = $softSkillsTitle;
        return $this;
    }

    public function getSoftSkills(): ?string
    {
        return $this->softSkills;
    }

    public function setSoftSkills(?string $softSkills): static
    {
        $this->softSkills = $softSkills;
        return $this;
    }

    public function getTechnicalSkillsTitle(): ?string
    {
        return $this->technicalSkillsTitle;
    }

    public function setTechnicalSkillsTitle(?string $technicalSkillsTitle): static
    {
        $this->technicalSkillsTitle = $technicalSkillsTitle;
        return $this;
    }

    public function getTechnicalSkills(): ?string
    {
        return $this->technicalSkills;
    }

    public function setTechnicalSkills(?string $technicalSkills): static
    {
        $this->technicalSkills = $technicalSkills;
        return $this;
    }

    public function getContactTitle(): ?string
    {
        return $this->contactTitle;
    }

    public function setContactTitle(?string $contactTitle): static
    {
        $this->contactTitle = $contactTitle;
        return $this;
    }

    public function getContactDescription(): ?string
    {
        return $this->contactDescription;
    }

    public function setContactDescription(?string $contactDescription): static
    {
        $this->contactDescription = $contactDescription;
        return $this;
    }

    public function getContactEmail(): ?string
    {
        return $this->contactEmail;
    }

    public function setContactEmail(?string $contactEmail): static
    {
        $this->contactEmail = $contactEmail;
        return $this;
    }

    public function getContactPhone(): ?string
    {
        return $this->contactPhone;
    }

    public function setContactPhone(?string $contactPhone): static
    {
        $this->contactPhone = $contactPhone;
        return $this;
    }

    public function getMetaTitle(): ?string
    {
        return $this->metaTitle;
    }

    public function setMetaTitle(?string $metaTitle): static
    {
        $this->metaTitle = $metaTitle;
        return $this;
    }

    public function getMetaDescription(): ?string
    {
        return $this->metaDescription;
    }

    public function setMetaDescription(?string $metaDescription): static
    {
        $this->metaDescription = $metaDescription;
        return $this;
    }

    public function getMetaKeywords(): ?string
    {
        return $this->metaKeywords;
    }

    public function setMetaKeywords(?string $metaKeywords): static
    {
        $this->metaKeywords = $metaKeywords;
        return $this;
    }

    /**
     * @return Collection<int, ProgramFaculty>
     */
    public function getFaculty(): Collection
    {
        return $this->faculty;
    }

    public function addFaculty(ProgramFaculty $faculty): static
    {
        if (!$this->faculty->contains($faculty)) {
            $this->faculty->add($faculty);
            $faculty->setProgram($this);
        }
        return $this;
    }

    public function removeFaculty(ProgramFaculty $faculty): static
    {
        if ($this->faculty->removeElement($faculty)) {
            if ($faculty->getProgram() === $this) {
                $faculty->setProgram(null);
            }
        }
        return $this;
    }

    /**
     * @return Collection<int, ProgramLaboratory>
     */
    public function getLaboratories(): Collection
    {
        return $this->laboratories;
    }

    public function addLaboratory(ProgramLaboratory $laboratory): static
    {
        if (!$this->laboratories->contains($laboratory)) {
            $this->laboratories->add($laboratory);
            $laboratory->setProgram($this);
        }
        return $this;
    }

    public function removeLaboratory(ProgramLaboratory $laboratory): static
    {
        if ($this->laboratories->removeElement($laboratory)) {
            if ($laboratory->getProgram() === $this) {
                $laboratory->setProgram(null);
            }
        }
        return $this;
    }

    /**
     * @return Collection<int, ProgramSpecialization>
     */
    public function getSpecializations(): Collection
    {
        return $this->specializations;
    }

    public function addSpecialization(ProgramSpecialization $specialization): static
    {
        if (!$this->specializations->contains($specialization)) {
            $this->specializations->add($specialization);
            $specialization->setProgram($this);
        }
        return $this;
    }

    public function removeSpecialization(ProgramSpecialization $specialization): static
    {
        if ($this->specializations->removeElement($specialization)) {
            if ($specialization->getProgram() === $this) {
                $specialization->setProgram(null);
            }
        }
        return $this;
    }

    public function __toString(): string
    {
        return $this->programName ?? '';
    }
}
