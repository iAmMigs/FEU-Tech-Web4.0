<?php

namespace App\Entity;

use App\Repository\AdmissionScholarshipsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdmissionScholarshipsRepository::class)]
class AdmissionScholarships
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

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $heroTitle = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $heroDescription = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMetaTitle(): ?string { return $this->metaTitle; }
    public function setMetaTitle(?string $metaTitle): static { $this->metaTitle = $metaTitle; return $this; }

    public function getMetaDescription(): ?string { return $this->metaDescription; }
    public function setMetaDescription(?string $metaDescription): static { $this->metaDescription = $metaDescription; return $this; }

    public function getMetaKeywords(): ?string { return $this->metaKeywords; }
    public function setMetaKeywords(?string $metaKeywords): static { $this->metaKeywords = $metaKeywords; return $this; }

    public function getHeroImage(): ?string { return $this->heroImage; }
    public function setHeroImage(?string $heroImage): static { $this->heroImage = $heroImage; return $this; }

    public function getHeroTitle(): ?string { return $this->heroTitle; }
    public function setHeroTitle(?string $heroTitle): static { $this->heroTitle = $heroTitle; return $this; }

    public function getHeroDescription(): ?string { return $this->heroDescription; }
    public function setHeroDescription(?string $heroDescription): static { $this->heroDescription = $heroDescription; return $this; }
}
