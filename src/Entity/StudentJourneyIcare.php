<?php

namespace App\Entity;

use App\Repository\StudentJourneyIcareRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudentJourneyIcareRepository::class)]
#[ORM\Table(name: 'student_journey_icare')]
class StudentJourneyIcare
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = NULL;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $metaTitle = NULL;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $metaDescription = NULL;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $metaKeywords = NULL;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $heroImage = NULL;

    #[ORM\Column(length: 255)]
    private ?string $title = NULL;

    #[ORM\Column(length: 255)]
    private ?string $subtitle = NULL;

    #[ORM\Column(length: 255)]
    private ?string $holisticWellnessTitle = NULL;

    #[ORM\Column(length: 255)]
    private ?string $mentalHealthSupportTitle = NULL;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $learningDescription = NULL;

    #[ORM\Column(length: 255)]
    private ?string $floorLocation = NULL;

    #[ORM\Column(length: 255)]
    private ?string $emailAddress = NULL;

    #[ORM\Column(length: 255)]
    private ?string $fbLink = NULL;

    public function getId(): ?int { return $this->id; }
    public function getMetaTitle(): ?string { return $this->metaTitle; }
    public function setMetaTitle(?string $metaTitle): self { $this->metaTitle = $metaTitle; return $this; }
    public function getMetaDescription(): ?string { return $this->metaDescription; }
    public function setMetaDescription(?string $metaDescription): self { $this->metaDescription = $metaDescription; return $this; }
    public function getMetaKeywords(): ?string { return $this->metaKeywords; }
    public function setMetaKeywords(?string $metaKeywords): self { $this->metaKeywords = $metaKeywords; return $this; }
    public function getHeroImage(): ?string { return $this->heroImage; }
    public function setHeroImage(?string $heroImage): self { $this->heroImage = $heroImage; return $this; }
    public function getTitle(): ?string { return $this->title; }
    public function setTitle(string $title): self { $this->title = $title; return $this; }
    public function getSubtitle(): ?string { return $this->subtitle; }
    public function setSubtitle(string $subtitle): self { $this->subtitle = $subtitle; return $this; }
    public function getHolisticWellnessTitle(): ?string { return $this->holisticWellnessTitle; }
    public function setHolisticWellnessTitle(string $holisticWellnessTitle): self { $this->holisticWellnessTitle = $holisticWellnessTitle; return $this; }
    public function getMentalHealthSupportTitle(): ?string { return $this->mentalHealthSupportTitle; }
    public function setMentalHealthSupportTitle(string $mentalHealthSupportTitle): self { $this->mentalHealthSupportTitle = $mentalHealthSupportTitle; return $this; }
    public function getLearningDescription(): ?string { return $this->learningDescription; }
    public function setLearningDescription(string $learningDescription): self { $this->learningDescription = $learningDescription; return $this; }
    public function getFloorLocation(): ?string { return $this->floorLocation; }
    public function setFloorLocation(string $floorLocation): self { $this->floorLocation = $floorLocation; return $this; }
    public function getEmailAddress(): ?string { return $this->emailAddress; }
    public function setEmailAddress(string $emailAddress): self { $this->emailAddress = $emailAddress; return $this; }
    public function getFbLink(): ?string { return $this->fbLink; }
    public function setFbLink(string $fbLink): self { $this->fbLink = $fbLink; return $this; }
}