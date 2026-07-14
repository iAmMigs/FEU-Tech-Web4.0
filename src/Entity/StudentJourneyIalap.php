<?php

namespace App\Entity;

use App\Repository\StudentJourneyIalapRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudentJourneyIalapRepository::class)]
#[ORM\Table(name: 'student_journey_ialap')]
class StudentJourneyIalap
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

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $heroImage = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $subtitle = null;

    #[ORM\Column(length: 255)]
    private ?string $tagline = null;

    #[ORM\Column(length: 255)]
    private ?string $welcomeTitle = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $welcomeDescription = null;

    #[ORM\Column(length: 255)]
    private ?string $cardTitle = null;

    #[ORM\Column(length: 255)]
    private ?string $cardPriceSub = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $cardProcessNotes = null;

    #[ORM\Column(length: 255)]
    private ?string $cardLearnMoreUrl = null;

    #[ORM\Column(length: 255)]
    private ?string $officeLocation = null;

    #[ORM\Column(length: 255)]
    private ?string $officeEmail = null;

    #[ORM\Column(length: 255)]
    private ?string $officeLocalPhone = null;

    #[ORM\Column(length: 255)]
    private ?string $fbLink = null;

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
    public function getTagline(): ?string { return $this->tagline; }
    public function setTagline(string $tagline): self { $this->tagline = $tagline; return $this; }
    public function getWelcomeTitle(): ?string { return $this->welcomeTitle; }
    public function setWelcomeTitle(string $welcomeTitle): self { $this->welcomeTitle = $welcomeTitle; return $this; }
    public function getWelcomeDescription(): ?string { return $this->welcomeDescription; }
    public function setWelcomeDescription(string $welcomeDescription): self { $this->welcomeDescription = $welcomeDescription; return $this; }
    public function getCardTitle(): ?string { return $this->cardTitle; }
    public function setCardTitle(string $cardTitle): self { $this->cardTitle = $cardTitle; return $this; }
    public function getCardPriceSub(): ?string { return $this->cardPriceSub; }
    public function setCardPriceSub(string $cardPriceSub): self { $this->cardPriceSub = $cardPriceSub; return $this; }
    public function getCardProcessNotes(): ?string { return $this->cardProcessNotes; }
    public function setCardProcessNotes(string $cardProcessNotes): self { $this->cardProcessNotes = $cardProcessNotes; return $this; }
    public function getCardLearnMoreUrl(): ?string { return $this->cardLearnMoreUrl; }
    public function setCardLearnMoreUrl(string $cardLearnMoreUrl): self { $this->cardLearnMoreUrl = $cardLearnMoreUrl; return $this; }
    public function getOfficeLocation(): ?string { return $this->officeLocation; }
    public function setOfficeLocation(string $officeLocation): self { $this->officeLocation = $officeLocation; return $this; }
    public function getOfficeEmail(): ?string { return $this->officeEmail; }
    public function setOfficeEmail(string $officeEmail): self { $this->officeEmail = $officeEmail; return $this; }
    public function getOfficeLocalPhone(): ?string { return $this->officeLocalPhone; }
    public function setOfficeLocalPhone(string $officeLocalPhone): self { $this->officeLocalPhone = $officeLocalPhone; return $this; }
    public function getFbLink(): ?string { return $this->fbLink; }
    public function setFbLink(string $fbLink): self { $this->fbLink = $fbLink; return $this; }
}