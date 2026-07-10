<?php

namespace App\Entity;

use App\Repository\AcademicsRegistrarRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AcademicsRegistrarRepository::class)]
class AcademicsRegistrar
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $heroBadge = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $heroTitle = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $heroDescription = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $heroEmail = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $calendarYear = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $aboutBadge = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $aboutTitle = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $aboutDescription1 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $aboutDescription2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $objectivesBadge = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $objectivesTitle = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $objectivesDescription1 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $objectivesDescription2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $missionBadge = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $missionTitle = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $missionDescription = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $visionBadge = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $visionTitle = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $visionDescription = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $metaTitle = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $metaDescription = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $metaKeywords = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHeroBadge(): ?string
    {
        return $this->heroBadge;
    }

    public function setHeroBadge(?string $heroBadge): static
    {
        $this->heroBadge = $heroBadge;
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

    public function getHeroDescription(): ?string
    {
        return $this->heroDescription;
    }

    public function setHeroDescription(?string $heroDescription): static
    {
        $this->heroDescription = $heroDescription;
        return $this;
    }

    public function getHeroEmail(): ?string
    {
        return $this->heroEmail;
    }

    public function setHeroEmail(?string $heroEmail): static
    {
        $this->heroEmail = $heroEmail;
        return $this;
    }

    public function getCalendarYear(): ?string
    {
        return $this->calendarYear;
    }

    public function setCalendarYear(?string $calendarYear): static
    {
        $this->calendarYear = $calendarYear;
        return $this;
    }

    public function getAboutBadge(): ?string
    {
        return $this->aboutBadge;
    }

    public function setAboutBadge(?string $aboutBadge): static
    {
        $this->aboutBadge = $aboutBadge;
        return $this;
    }

    public function getAboutTitle(): ?string
    {
        return $this->aboutTitle;
    }

    public function setAboutTitle(?string $aboutTitle): static
    {
        $this->aboutTitle = $aboutTitle;
        return $this;
    }

    public function getAboutDescription1(): ?string
    {
        return $this->aboutDescription1;
    }

    public function setAboutDescription1(?string $aboutDescription1): static
    {
        $this->aboutDescription1 = $aboutDescription1;
        return $this;
    }

    public function getAboutDescription2(): ?string
    {
        return $this->aboutDescription2;
    }

    public function setAboutDescription2(?string $aboutDescription2): static
    {
        $this->aboutDescription2 = $aboutDescription2;
        return $this;
    }

    public function getObjectivesBadge(): ?string
    {
        return $this->objectivesBadge;
    }

    public function setObjectivesBadge(?string $objectivesBadge): static
    {
        $this->objectivesBadge = $objectivesBadge;
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

    public function getObjectivesDescription1(): ?string
    {
        return $this->objectivesDescription1;
    }

    public function setObjectivesDescription1(?string $objectivesDescription1): static
    {
        $this->objectivesDescription1 = $objectivesDescription1;
        return $this;
    }

    public function getObjectivesDescription2(): ?string
    {
        return $this->objectivesDescription2;
    }

    public function setObjectivesDescription2(?string $objectivesDescription2): static
    {
        $this->objectivesDescription2 = $objectivesDescription2;
        return $this;
    }

    public function getMissionBadge(): ?string
    {
        return $this->missionBadge;
    }

    public function setMissionBadge(?string $missionBadge): static
    {
        $this->missionBadge = $missionBadge;
        return $this;
    }

    public function getMissionTitle(): ?string
    {
        return $this->missionTitle;
    }

    public function setMissionTitle(?string $missionTitle): static
    {
        $this->missionTitle = $missionTitle;
        return $this;
    }

    public function getMissionDescription(): ?string
    {
        return $this->missionDescription;
    }

    public function setMissionDescription(?string $missionDescription): static
    {
        $this->missionDescription = $missionDescription;
        return $this;
    }

    public function getVisionBadge(): ?string
    {
        return $this->visionBadge;
    }

    public function setVisionBadge(?string $visionBadge): static
    {
        $this->visionBadge = $visionBadge;
        return $this;
    }

    public function getVisionTitle(): ?string
    {
        return $this->visionTitle;
    }

    public function setVisionTitle(?string $visionTitle): static
    {
        $this->visionTitle = $visionTitle;
        return $this;
    }

    public function getVisionDescription(): ?string
    {
        return $this->visionDescription;
    }

    public function setVisionDescription(?string $visionDescription): static
    {
        $this->visionDescription = $visionDescription;
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
}
