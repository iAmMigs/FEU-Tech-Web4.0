<?php

namespace App\Entity;

use App\Repository\StudentJourneyDuRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudentJourneyDuRepository::class)]
#[ORM\Table(name: 'student_journey_du')]
class StudentJourneyDu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $metaTitle = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $metaDescription = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $metaKeywords = null;

    #[ORM\Column(length: 255)]
    private ?string $heroTitle = 'Student Discipline Unit';

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $heroSubtitle = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $heroImage = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $overviewText = null;

    #[ORM\Column(length: 255)]
    private ?string $policyTitle = 'School Policy Implementation';

    #[ORM\Column(type: Types::JSON)]
    private array $policyItems = [];

    #[ORM\Column(length: 255)]
    private ?string $safetyTitle = 'Safety & Security';

    #[ORM\Column(type: Types::TEXT)]
    private ?string $safetyDescription = null;

    #[ORM\Column(length: 255)]
    private ?string $clearancesTitle = 'Clearances';

    #[ORM\Column(type: Types::JSON)]
    private array $clearancesItems = [];

    #[ORM\Column(length: 255)]
    private ?string $lostFoundTitle = 'Lost & Found';

    #[ORM\Column(type: Types::TEXT)]
    private ?string $lostFoundDescription = null;

    #[ORM\Column(length: 100)]
    private ?string $contactRoom = null;

    #[ORM\Column(length: 100)]
    private ?string $contactPhone = null;

    #[ORM\Column(length: 100)]
    private ?string $contactEmail = null;

    // Getters and Setters
    public function getId(): ?int { return $this->id; }
    public function getMetaTitle(): ?string { return $this->metaTitle; }
    public function setMetaTitle(?string $metaTitle): self { $this->metaTitle = $metaTitle; return $this; }
    public function getMetaDescription(): ?string { return $this->metaDescription; }
    public function setMetaDescription(?string $metaDescription): self { $this->metaDescription = $metaDescription; return $this; }
    public function getMetaKeywords(): ?string { return $this->metaKeywords; }
    public function setMetaKeywords(?string $metaKeywords): self { $this->metaKeywords = $metaKeywords; return $this; }
    public function getHeroTitle(): ?string { return $this->heroTitle; }
    public function setHeroTitle(string $heroTitle): self { $this->heroTitle = $heroTitle; return $this; }
    public function getHeroSubtitle(): ?string { return $this->heroSubtitle; }
    public function setHeroSubtitle(?string $heroSubtitle): self { $this->heroSubtitle = $heroSubtitle; return $this; }
    public function getHeroImage(): ?string { return $this->heroImage; }
    public function setHeroImage(?string $heroImage): self { $this->heroImage = $heroImage; return $this; }
    public function getOverviewText(): ?string { return $this->overviewText; }
    public function setOverviewText(string $overviewText): self { $this->overviewText = $overviewText; return $this; }
    
    public function getPolicyTitle(): ?string { return $this->policyTitle; }
    public function setPolicyTitle(string $policyTitle): self { $this->policyTitle = $policyTitle; return $this; }
    public function getPolicyItems(): array { return $this->policyItems; }
    public function setPolicyItems(array $policyItems): self { $this->policyItems = $policyItems; return $this; }
    
    public function getSafetyTitle(): ?string { return $this->safetyTitle; }
    public function setSafetyTitle(string $safetyTitle): self { $this->safetyTitle = $safetyTitle; return $this; }
    public function getSafetyDescription(): ?string { return $this->safetyDescription; }
    public function setSafetyDescription(string $safetyDescription): self { $this->safetyDescription = $safetyDescription; return $this; }
    
    public function getClearancesTitle(): ?string { return $this->clearancesTitle; }
    public function setClearancesTitle(string $clearancesTitle): self { $this->clearancesTitle = $clearancesTitle; return $this; }
    public function getClearancesItems(): array { return $this->clearancesItems; }
    public function setClearancesItems(array $clearancesItems): self { $this->clearancesItems = $clearancesItems; return $this; }
    
    public function getLostFoundTitle(): ?string { return $this->lostFoundTitle; }
    public function setLostFoundTitle(string $lostFoundTitle): self { $this->lostFoundTitle = $lostFoundTitle; return $this; }
    public function getLostFoundDescription(): ?string { return $this->lostFoundDescription; }
    public function setLostFoundDescription(string $lostFoundDescription): self { $this->lostFoundDescription = $lostFoundDescription; return $this; }
    
    public function getContactRoom(): ?string { return $this->contactRoom; }
    public function setContactRoom(string $contactRoom): self { $this->contactRoom = $contactRoom; return $this; }
    public function getContactPhone(): ?string { return $this->contactPhone; }
    public function setContactPhone(string $contactPhone): self { $this->contactPhone = $contactPhone; return $this; }
    public function getContactEmail(): ?string { return $this->contactEmail; }
    public function setContactEmail(string $contactEmail): self { $this->contactEmail = $contactEmail; return $this; }
}