<?php

namespace App\Entity;

use App\Repository\StudentJourneySoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudentJourneySoRepository::class)]
#[ORM\Table(name: 'student_journey_so')]
class StudentJourneySo
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
    private ?string $heroTitle = 'Student Organizations';

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $heroSubtitle = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $heroImage = null;

    #[ORM\Column(length: 255)]
    private ?string $sccTitle = 'Student Coordinating Council (SCC)';

    #[ORM\Column(type: Types::TEXT)]
    private ?string $sccDescription = null;

    #[ORM\Column(length: 255)]
    private ?string $innovatorTitle = 'The Innovator';

    #[ORM\Column(type: Types::TEXT)]
    private ?string $innovatorDescription = null;

    #[ORM\Column(length: 255)]
    private ?string $academicTitle = 'Academic Organizations';

    #[ORM\Column(length: 255)]
    private ?string $specialTitle = 'Special Interest Organizations';

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $specialSubtitle = null;

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
    
    public function getSccTitle(): ?string { return $this->sccTitle; }
    public function setSccTitle(string $sccTitle): self { $this->sccTitle = $sccTitle; return $this; }
    public function getSccDescription(): ?string { return $this->sccDescription; }
    public function setSccDescription(string $sccDescription): self { $this->sccDescription = $sccDescription; return $this; }
    
    public function getInnovatorTitle(): ?string { return $this->innovatorTitle; }
    public function setInnovatorTitle(string $innovatorTitle): self { $this->innovatorTitle = $innovatorTitle; return $this; }
    public function getInnovatorDescription(): ?string { return $this->innovatorDescription; }
    public function setInnovatorDescription(string $innovatorDescription): self { $this->innovatorDescription = $innovatorDescription; return $this; }
    
    public function getAcademicTitle(): ?string { return $this->academicTitle; }
    public function setAcademicTitle(string $academicTitle): self { $this->academicTitle = $academicTitle; return $this; }
    
    public function getSpecialTitle(): ?string { return $this->specialTitle; }
    public function setSpecialTitle(string $specialTitle): self { $this->specialTitle = $specialTitle; return $this; }
    public function getSpecialSubtitle(): ?string { return $this->specialSubtitle; }
    public function setSpecialSubtitle(?string $specialSubtitle): self { $this->specialSubtitle = $specialSubtitle; return $this; }
}