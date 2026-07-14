<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'student_journey_health_service')]
class StudentJourneyHealthService
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
    private ?string $heroTitle = 'Health Services';

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $heroSubtitle = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $heroImage = null;

    #[ORM\Column(length: 255)]
    private ?string $wellbeingTitle = 'Dedicated to Your Well-being';

    #[ORM\Column(type: Types::TEXT)]
    private ?string $wellbeingDescription = null;

    #[ORM\Column(length: 255)]
    private ?string $telemedicineTitle = 'Telemedicine Services Available';

    #[ORM\Column(type: Types::TEXT)]
    private ?string $telemedicineDescription = null;

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

    public function getWellbeingTitle(): ?string { return $this->wellbeingTitle; }
    public function setWellbeingTitle(string $wellbeingTitle): self { $this->wellbeingTitle = $wellbeingTitle; return $this; }
    public function getWellbeingDescription(): ?string { return $this->wellbeingDescription; }
    public function setWellbeingDescription(string $wellbeingDescription): self { $this->wellbeingDescription = $wellbeingDescription; return $this; }

    public function getTelemedicineTitle(): ?string { return $this->telemedicineTitle; }
    public function setTelemedicineTitle(string $telemedicineTitle): self { $this->telemedicineTitle = $telemedicineTitle; return $this; }
    public function getTelemedicineDescription(): ?string { return $this->telemedicineDescription; }
    public function setTelemedicineDescription(string $telemedicineDescription): self { $this->telemedicineDescription = $telemedicineDescription; return $this; }
}