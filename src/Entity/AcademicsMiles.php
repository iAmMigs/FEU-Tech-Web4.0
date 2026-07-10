<?php

namespace App\Entity;

use App\Repository\AcademicsMilesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AcademicsMilesRepository::class)]
class AcademicsMiles
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $heroBadge = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $heroTitle = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $heroLogo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $heroSubtitle = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $heroDescription = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $aboutSubtitle = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $aboutTitle = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $aboutDescription1 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $aboutDescription2 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $aboutDescription3 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $canvasTitle = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $canvasSubtitle = null;

    #[ORM\Column(type: Types::JSON, nullable: true)]
    private ?array $canvasFeatures = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $addonsTitle = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $addonsSubtitle = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $addonsDescription = null;

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

    public function getHeroBadge(): ?string
    {
        return $this->heroBadge;
    }

    public function setHeroBadge(?string $heroBadge): static
    {
        $this->heroBadge = $heroBadge;
        return $this;
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

    public function getHeroLogo(): ?string
    {
        return $this->heroLogo;
    }

    public function setHeroLogo(?string $heroLogo): static
    {
        $this->heroLogo = $heroLogo;
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

    public function getHeroDescription(): ?string
    {
        return $this->heroDescription;
    }

    public function setHeroDescription(?string $heroDescription): static
    {
        $this->heroDescription = $heroDescription;
        return $this;
    }

    public function getAboutSubtitle(): ?string
    {
        return $this->aboutSubtitle;
    }

    public function setAboutSubtitle(?string $aboutSubtitle): static
    {
        $this->aboutSubtitle = $aboutSubtitle;
        return $this;
    }

    public function getAboutTitle(): ?string
    {
        return $this->aboutTitle;
    }

    public function setAboutTitle(?string $aboutTitle): static
    {
        $this->aboutTitle = $aboutTitle;
        return $this;
    }

    public function getAboutDescription1(): ?string
    {
        return $this->aboutDescription1;
    }

    public function setAboutDescription1(?string $aboutDescription1): static
    {
        $this->aboutDescription1 = $aboutDescription1;
        return $this;
    }

    public function getAboutDescription2(): ?string
    {
        return $this->aboutDescription2;
    }

    public function setAboutDescription2(?string $aboutDescription2): static
    {
        $this->aboutDescription2 = $aboutDescription2;
        return $this;
    }

    public function getAboutDescription3(): ?string
    {
        return $this->aboutDescription3;
    }

    public function setAboutDescription3(?string $aboutDescription3): static
    {
        $this->aboutDescription3 = $aboutDescription3;
        return $this;
    }

    public function getCanvasTitle(): ?string
    {
        return $this->canvasTitle;
    }

    public function setCanvasTitle(?string $canvasTitle): static
    {
        $this->canvasTitle = $canvasTitle;
        return $this;
    }

    public function getCanvasSubtitle(): ?string
    {
        return $this->canvasSubtitle;
    }

    public function setCanvasSubtitle(?string $canvasSubtitle): static
    {
        $this->canvasSubtitle = $canvasSubtitle;
        return $this;
    }

    public function getCanvasFeatures(): ?array
    {
        return $this->canvasFeatures;
    }

    public function setCanvasFeatures(?array $canvasFeatures): static
    {
        $this->canvasFeatures = $canvasFeatures;
        return $this;
    }

    public function getAddonsTitle(): ?string
    {
        return $this->addonsTitle;
    }

    public function setAddonsTitle(?string $addonsTitle): static
    {
        $this->addonsTitle = $addonsTitle;
        return $this;
    }

    public function getAddonsSubtitle(): ?string
    {
        return $this->addonsSubtitle;
    }

    public function setAddonsSubtitle(?string $addonsSubtitle): static
    {
        $this->addonsSubtitle = $addonsSubtitle;
        return $this;
    }

    public function getAddonsDescription(): ?string
    {
        return $this->addonsDescription;
    }

    public function setAddonsDescription(?string $addonsDescription): static
    {
        $this->addonsDescription = $addonsDescription;
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
