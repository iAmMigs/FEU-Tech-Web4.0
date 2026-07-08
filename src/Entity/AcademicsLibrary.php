<?php

namespace App\Entity;

use App\Repository\AcademicsLibraryRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AcademicsLibraryRepository::class)]
class AcademicsLibrary
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $heroTitle = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $heroSubtitle = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $locationRoom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $trunkline = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $localNumber = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $visionText = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $missionText = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $goalText = null;

    #[ORM\Column(type: Types::JSON, nullable: true)]
    private ?array $coreValues = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $historyText = null;

    #[ORM\Column(type: Types::JSON, nullable: true)]
    private ?array $serviceHours = null;

    #[ORM\Column(type: Types::JSON, nullable: true)]
    private ?array $outsideServiceHours = null;

    #[ORM\Column(type: Types::JSON, nullable: true)]
    private ?array $policies = null;

    #[ORM\Column(type: Types::JSON, nullable: true)]
    private ?array $journals = null;

    #[ORM\Column(type: Types::JSON, nullable: true)]
    private ?array $libraryAreas = null;

    #[ORM\Column(type: Types::JSON, nullable: true)]
    private ?array $eLibrary = null;

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

    public function getLocationRoom(): ?string
    {
        return $this->locationRoom;
    }

    public function setLocationRoom(?string $locationRoom): static
    {
        $this->locationRoom = $locationRoom;
        return $this;
    }

    public function getTrunkline(): ?string
    {
        return $this->trunkline;
    }

    public function setTrunkline(?string $trunkline): static
    {
        $this->trunkline = $trunkline;
        return $this;
    }

    public function getLocalNumber(): ?string
    {
        return $this->localNumber;
    }

    public function setLocalNumber(?string $localNumber): static
    {
        $this->localNumber = $localNumber;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;
        return $this;
    }

    public function getVisionText(): ?string
    {
        return $this->visionText;
    }

    public function setVisionText(?string $visionText): static
    {
        $this->visionText = $visionText;
        return $this;
    }

    public function getMissionText(): ?string
    {
        return $this->missionText;
    }

    public function setMissionText(?string $missionText): static
    {
        $this->missionText = $missionText;
        return $this;
    }

    public function getGoalText(): ?string
    {
        return $this->goalText;
    }

    public function setGoalText(?string $goalText): static
    {
        $this->goalText = $goalText;
        return $this;
    }

    public function getCoreValues(): ?array
    {
        return $this->coreValues;
    }

    public function setCoreValues(?array $coreValues): static
    {
        $this->coreValues = $coreValues;
        return $this;
    }

    public function getHistoryText(): ?string
    {
        return $this->historyText;
    }

    public function setHistoryText(?string $historyText): static
    {
        $this->historyText = $historyText;
        return $this;
    }

    public function getServiceHours(): ?array
    {
        return $this->serviceHours;
    }

    public function setServiceHours(?array $serviceHours): static
    {
        $this->serviceHours = $serviceHours;
        return $this;
    }

    public function getOutsideServiceHours(): ?array
    {
        return $this->outsideServiceHours;
    }

    public function setOutsideServiceHours(?array $outsideServiceHours): static
    {
        $this->outsideServiceHours = $outsideServiceHours;
        return $this;
    }

    public function getPolicies(): ?array
    {
        return $this->policies;
    }

    public function setPolicies(?array $policies): static
    {
        $this->policies = $policies;
        return $this;
    }

    public function getJournals(): ?array
    {
        return $this->journals;
    }

    public function setJournals(?array $journals): static
    {
        $this->journals = $journals;
        return $this;
    }

    public function getLibraryAreas(): ?array
    {
        return $this->libraryAreas;
    }

    public function setLibraryAreas(?array $libraryAreas): static
    {
        $this->libraryAreas = $libraryAreas;
        return $this;
    }

    public function getELibrary(): ?array
    {
        return $this->eLibrary;
    }

    public function setELibrary(?array $eLibrary): static
    {
        $this->eLibrary = $eLibrary;
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
