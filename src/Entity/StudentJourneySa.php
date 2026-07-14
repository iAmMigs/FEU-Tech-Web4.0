<?php

namespace App\Entity;

use App\Repository\StudentJourneySaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudentJourneySaRepository::class)]
#[ORM\Table(name: 'student_journey_sa')]
class StudentJourneySa
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
    private ?string $heroTitle = 'Student Activities & Development';

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $heroSubtitle = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $heroImage = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $visionText = null;

    #[ORM\Column(type: Types::JSON)]
    private array $missionItems = [];

    #[ORM\Column(length: 255)]
    private ?string $titleOne = 'Serve';

    #[ORM\Column(type: Types::TEXT)]
    private ?string $titleOneText = null;

    #[ORM\Column(length: 255)]
    private ?string $titleTwo = 'Lead';

    #[ORM\Column(type: Types::TEXT)]
    private ?string $titleTwoText = null;

    #[ORM\Column(length: 255)]
    private ?string $titleThree = 'Excel';

    #[ORM\Column(type: Types::TEXT)]
    private ?string $titleThreeText = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $devDescription = null;

    #[ORM\Column(type: Types::JSON)]
    private array $devBullets = [];

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $actDescription = null;

    #[ORM\Column(type: Types::JSON)]
    private array $actBullets = [];

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
    public function getVisionText(): ?string { return $this->visionText; }
    public function setVisionText(string $visionText): self { $this->visionText = $visionText; return $this; }
    public function getMissionItems(): array { return $this->missionItems; }
    public function setMissionItems(array $missionItems): self { $this->missionItems = $missionItems; return $this; }
    
    public function getTitleOne(): ?string { return $this->titleOne; }
    public function setTitleOne(string $titleOne): self { $this->titleOne = $titleOne; return $this; }
    public function getTitleOneText(): ?string { return $this->titleOneText; }
    public function setTitleOneText(string $titleOneText): self { $this->titleOneText = $titleOneText; return $this; }
    
    public function getTitleTwo(): ?string { return $this->titleTwo; }
    public function setTitleTwo(string $titleTwo): self { $this->titleTwo = $titleTwo; return $this; }
    public function getTitleTwoText(): ?string { return $this->titleTwoText; }
    public function setTitleTwoText(string $titleTwoText): self { $this->titleTwoText = $titleTwoText; return $this; }
    
    public function getTitleThree(): ?string { return $this->titleThree; }
    public function setTitleThree(string $titleThree): self { $this->titleThree = $titleThree; return $this; }
    public function getTitleThreeText(): ?string { return $this->titleThreeText; }
    public function setTitleThreeText(string $titleThreeText): self { $this->titleThreeText = $titleThreeText; return $this; }

    public function getDevDescription(): ?string { return $this->devDescription; }
    public function setDevDescription(?string $devDescription): self { $this->devDescription = $devDescription; return $this; }
    public function getDevBullets(): array { return $this->devBullets; }
    public function setDevBullets(array $devBullets): self { $this->devBullets = $devBullets; return $this; }
    public function getActDescription(): ?string { return $this->actDescription; }
    public function setActDescription(?string $actDescription): self { $this->actDescription = $actDescription; return $this; }
    public function getActBullets(): array { return $this->actBullets; }
    public function setActBullets(array $actBullets): self { $this->actBullets = $actBullets; return $this; }
    public function getContactRoom(): ?string { return $this->contactRoom; }
    public function setContactRoom(string $contactRoom): self { $this->contactRoom = $contactRoom; return $this; }
    public function getContactPhone(): ?string { return $this->contactPhone; }
    public function setContactPhone(string $contactPhone): self { $this->contactPhone = $contactPhone; return $this; }
    public function getContactEmail(): ?string { return $this->contactEmail; }
    public function setContactEmail(string $contactEmail): self { $this->contactEmail = $contactEmail; return $this; }
}