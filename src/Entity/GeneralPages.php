<?php

namespace App\Entity;

use App\Repository\GeneralPagesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GeneralPagesRepository::class)]
class GeneralPages
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $pageName = null;

    #[ORM\Column(length: 255, unique: true)]
    private ?string $slug = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $metaTitle = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $metaDescription = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $metaKeywords = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $heroVideoPath = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $heroTagline = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $heroTitle = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $heroDescription = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $heroBtn1Text = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $heroBtn1Url = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $heroBtn2Text = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $heroBtn2Url = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $heroBtn3Text = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $heroBtn3Url = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $coursesBgImage = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $coeCardTitle = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $coeCardDescription = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $coeCardBtnText = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $coeCardBtnUrl = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ccsmaCardTitle = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $ccsmaCardDescription = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ccsmaCardBtnText = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ccsmaCardBtnUrl = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $accordion1Title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $accordion1Content = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $accordion2Title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $accordion2Content = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $accordion3Title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $accordion3Content = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $accordion4Title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $accordion4Content = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPageName(): ?string
    {
        return $this->pageName;
    }

    public function setPageName(string $pageName): static
    {
        $this->pageName = $pageName;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getMetaTitle(): ?string { return $this->metaTitle; }
    public function setMetaTitle(?string $metaTitle): static { $this->metaTitle = $metaTitle; return $this; }

    public function getMetaDescription(): ?string { return $this->metaDescription; }
    public function setMetaDescription(?string $metaDescription): static { $this->metaDescription = $metaDescription; return $this; }

    public function getMetaKeywords(): ?string { return $this->metaKeywords; }
    public function setMetaKeywords(?string $metaKeywords): static { $this->metaKeywords = $metaKeywords; return $this; }

    public function getHeroVideoPath(): ?string { return $this->heroVideoPath; }
    public function setHeroVideoPath(?string $heroVideoPath): static { $this->heroVideoPath = $heroVideoPath; return $this; }

    public function getHeroTagline(): ?string { return $this->heroTagline; }
    public function setHeroTagline(?string $heroTagline): static { $this->heroTagline = $heroTagline; return $this; }

    public function getHeroTitle(): ?string { return $this->heroTitle; }
    public function setHeroTitle(?string $heroTitle): static { $this->heroTitle = $heroTitle; return $this; }

    public function getHeroDescription(): ?string { return $this->heroDescription; }
    public function setHeroDescription(?string $heroDescription): static { $this->heroDescription = $heroDescription; return $this; }

    public function getHeroBtn1Text(): ?string { return $this->heroBtn1Text; }
    public function setHeroBtn1Text(?string $heroBtn1Text): static { $this->heroBtn1Text = $heroBtn1Text; return $this; }

    public function getHeroBtn1Url(): ?string { return $this->heroBtn1Url; }
    public function setHeroBtn1Url(?string $heroBtn1Url): static { $this->heroBtn1Url = $heroBtn1Url; return $this; }

    public function getHeroBtn2Text(): ?string { return $this->heroBtn2Text; }
    public function setHeroBtn2Text(?string $heroBtn2Text): static { $this->heroBtn2Text = $heroBtn2Text; return $this; }

    public function getHeroBtn2Url(): ?string { return $this->heroBtn2Url; }
    public function setHeroBtn2Url(?string $heroBtn2Url): static { $this->heroBtn2Url = $heroBtn2Url; return $this; }

    public function getHeroBtn3Text(): ?string { return $this->heroBtn3Text; }
    public function setHeroBtn3Text(?string $heroBtn3Text): static { $this->heroBtn3Text = $heroBtn3Text; return $this; }

    public function getHeroBtn3Url(): ?string { return $this->heroBtn3Url; }
    public function setHeroBtn3Url(?string $heroBtn3Url): static { $this->heroBtn3Url = $heroBtn3Url; return $this; }

    public function getCoursesBgImage(): ?string { return $this->coursesBgImage; }
    public function setCoursesBgImage(?string $coursesBgImage): static { $this->coursesBgImage = $coursesBgImage; return $this; }

    public function getCoeCardTitle(): ?string { return $this->coeCardTitle; }
    public function setCoeCardTitle(?string $coeCardTitle): static { $this->coeCardTitle = $coeCardTitle; return $this; }

    public function getCoeCardDescription(): ?string { return $this->coeCardDescription; }
    public function setCoeCardDescription(?string $coeCardDescription): static { $this->coeCardDescription = $coeCardDescription; return $this; }

    public function getCoeCardBtnText(): ?string { return $this->coeCardBtnText; }
    public function setCoeCardBtnText(?string $coeCardBtnText): static { $this->coeCardBtnText = $coeCardBtnText; return $this; }

    public function getCoeCardBtnUrl(): ?string { return $this->coeCardBtnUrl; }
    public function setCoeCardBtnUrl(?string $coeCardBtnUrl): static { $this->coeCardBtnUrl = $coeCardBtnUrl; return $this; }

    public function getCcsmaCardTitle(): ?string { return $this->ccsmaCardTitle; }
    public function setCcsmaCardTitle(?string $ccsmaCardTitle): static { $this->ccsmaCardTitle = $ccsmaCardTitle; return $this; }

    public function getCcsmaCardDescription(): ?string { return $this->ccsmaCardDescription; }
    public function setCcsmaCardDescription(?string $ccsmaCardDescription): static { $this->ccsmaCardDescription = $ccsmaCardDescription; return $this; }

    public function getCcsmaCardBtnText(): ?string { return $this->ccsmaCardBtnText; }
    public function setCcsmaCardBtnText(?string $ccsmaCardBtnText): static { $this->ccsmaCardBtnText = $ccsmaCardBtnText; return $this; }

    public function getCcsmaCardBtnUrl(): ?string { return $this->ccsmaCardBtnUrl; }
    public function setCcsmaCardBtnUrl(?string $ccsmaCardBtnUrl): static { $this->ccsmaCardBtnUrl = $ccsmaCardBtnUrl; return $this; }

    public function getAccordion1Title(): ?string { return $this->accordion1Title; }
    public function setAccordion1Title(?string $accordion1Title): static { $this->accordion1Title = $accordion1Title; return $this; }

    public function getAccordion1Content(): ?string { return $this->accordion1Content; }
    public function setAccordion1Content(?string $accordion1Content): static { $this->accordion1Content = $accordion1Content; return $this; }

    public function getAccordion2Title(): ?string { return $this->accordion2Title; }
    public function setAccordion2Title(?string $accordion2Title): static { $this->accordion2Title = $accordion2Title; return $this; }

    public function getAccordion2Content(): ?string { return $this->accordion2Content; }
    public function setAccordion2Content(?string $accordion2Content): static { $this->accordion2Content = $accordion2Content; return $this; }

    public function getAccordion3Title(): ?string { return $this->accordion3Title; }
    public function setAccordion3Title(?string $accordion3Title): static { $this->accordion3Title = $accordion3Title; return $this; }

    public function getAccordion3Content(): ?string { return $this->accordion3Content; }
    public function setAccordion3Content(?string $accordion3Content): static { $this->accordion3Content = $accordion3Content; return $this; }

    public function getAccordion4Title(): ?string { return $this->accordion4Title; }
    public function setAccordion4Title(?string $accordion4Title): static { $this->accordion4Title = $accordion4Title; return $this; }

    public function getAccordion4Content(): ?string { return $this->accordion4Content; }
    public function setAccordion4Content(?string $accordion4Content): static { $this->accordion4Content = $accordion4Content; return $this; }
}
