<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'student_journey_guidance')]
class StudentJourneyGuidance
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
    private ?string $heroTitle = 'Guidance & Counseling';

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $heroSubtitle = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $heroImage = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $bannerImage = null;

    #[ORM\Column(length: 255)]
    private ?string $overviewTitle = 'Empowering Students for Success';

    #[ORM\Column(type: Types::TEXT)]
    private ?string $overviewDescription = null;

    #[ORM\Column(length: 255)]
    private ?string $missionTitle = 'Our Mission';

    #[ORM\Column(type: Types::TEXT)]
    private ?string $missionDescription = null;

    #[ORM\Column(length: 255)]
    private ?string $faqUrl = null;

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
    public function getBannerImage(): ?string { return $this->bannerImage; }
    public function setBannerImage(?string $bannerImage): self { $this->bannerImage = $bannerImage; return $this; }
    public function getOverviewTitle(): ?string { return $this->overviewTitle; }
    public function setOverviewTitle(string $overviewTitle): self { $this->overviewTitle = $overviewTitle; return $this; }
    public function getOverviewDescription(): ?string { return $this->overviewDescription; }
    public function setOverviewDescription(string $overviewDescription): self { $this->overviewDescription = $overviewDescription; return $this; }
    public function getMissionTitle(): ?string { return $this->missionTitle; }
    public function setMissionTitle(string $missionTitle): self { $this->missionTitle = $missionTitle; return $this; }
    public function getMissionDescription(): ?string { return $this->missionDescription; }
    public function setMissionDescription(string $missionDescription): self { $this->missionDescription = $missionDescription; return $this; }
    public function getFaqUrl(): ?string { return $this->faqUrl; }
    public function setFaqUrl(string $faqUrl): self { $this->faqUrl = $faqUrl; return $this; }
}