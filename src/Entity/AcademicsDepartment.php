<?php

namespace App\Entity;

use App\Repository\AcademicsDepartmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AcademicsDepartmentRepository::class)]
class AcademicsDepartment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, unique: true)]
    private ?string $slug = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $heroImage = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $heroTitle = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $heroSubtitle = null;

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

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $metaTitle = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $metaDescription = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $metaKeywords = null;

    #[ORM\OneToMany(mappedBy: 'department', targetEntity: AcademicsProgram::class, orphanRemoval: true)]
    private Collection $programs;

    public function __construct()
    {
        $this->programs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;
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

    public function getHeroImage(): ?string
    {
        return $this->heroImage;
    }

    public function setHeroImage(?string $heroImage): static
    {
        $this->heroImage = $heroImage;
        return $this;
    }

    public function getHeroTitle(): ?string
    {
        return $this->heroTitle;
    }

    public function setHeroTitle(?string $heroTitle): static
    {
        $this->heroTitle = $heroTitle;
        return $this;
    }

    public function getHeroSubtitle(): ?string
    {
        return $this->heroSubtitle;
    }

    public function setHeroSubtitle(?string $heroSubtitle): static
    {
        $this->heroSubtitle = $heroSubtitle;
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
     * @return Collection<int, AcademicsProgram>
     */
    public function getPrograms(): Collection
    {
        return $this->programs;
    }

    public function addProgram(AcademicsProgram $program): static
    {
        if (!$this->programs->contains($program)) {
            $this->programs->add($program);
            $program->setDepartment($this);
        }
        return $this;
    }

    public function removeProgram(AcademicsProgram $program): static
    {
        if ($this->programs->removeElement($program)) {
            if ($program->getDepartment() === $this) {
                $program->setDepartment(null);
            }
        }
        return $this;
    }

    public function __toString(): string
    {
        return $this->name ?? '';
    }
}
