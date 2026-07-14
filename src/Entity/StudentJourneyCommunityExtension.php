<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'student_journey_community_extension')]
class StudentJourneyCommunityExtension
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
    private ?string $heroTitle = 'Community Extension';

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $heroSubtitle = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $heroImage = null;

    #[ORM\Column(length: 255)]
    private ?string $advocacyTitle = 'Advocacy';

    #[ORM\Column(type: Types::TEXT)]
    private ?string $advocacyDescription = null;

    #[ORM\Column(length: 255)]
    private ?string $compassionTitle = 'Compassion';

    #[ORM\Column(type: Types::TEXT)]
    private ?string $compassionDescription = null;

    #[ORM\Column(length: 255)]
    private ?string $empowermentTitle = 'Empowerment';

    #[ORM\Column(type: Types::TEXT)]
    private ?string $empowermentDescription = null;

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
    
    public function getAdvocacyTitle(): ?string { return $this->advocacyTitle; }
    public function setAdvocacyTitle(string $advocacyTitle): self { $this->advocacyTitle = $advocacyTitle; return $this; }
    public function getAdvocacyDescription(): ?string { return $this->advocacyDescription; }
    public function setAdvocacyDescription(string $advocacyDescription): self { $this->advocacyDescription = $advocacyDescription; return $this; }
    
    public function getCompassionTitle(): ?string { return $this->compassionTitle; }
    public function setCompassionTitle(string $compassionTitle): self { $this->compassionTitle = $compassionTitle; return $this; }
    public function getCompassionDescription(): ?string { return $this->compassionDescription; }
    public function setCompassionDescription(string $compassionDescription): self { $this->compassionDescription = $compassionDescription; return $this; }
    
    public function getEmpowermentTitle(): ?string { return $this->empowermentTitle; }
    public function setEmpowermentTitle(string $empowermentTitle): self { $this->empowermentTitle = $empowermentTitle; return $this; }
    public function getEmpowermentDescription(): ?string { return $this->empowermentDescription; }
    public function setEmpowermentDescription(string $empowermentDescription): self { $this->empowermentDescription = $empowermentDescription; return $this; }
}