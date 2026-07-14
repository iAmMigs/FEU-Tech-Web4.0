<?php

namespace App\Entity;

use App\Repository\HomeCarouselCardRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HomeCarouselCardRepository::class)]
class HomeCarouselCard
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $subtitle = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $logoPath = null;

    #[ORM\Column(length: 255)]
    private ?string $cardImagePath = null;

    #[ORM\Column(length: 255)]
    private ?string $heroBgPath = null;

    #[ORM\Column]
    private ?int $sortOrder = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getSubtitle(): ?string
    {
        return $this->subtitle;
    }

    public function setSubtitle(string $subtitle): static
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    public function getLogoPath(): ?string
    {
        return $this->logoPath;
    }

    public function setLogoPath(?string $logoPath): static
    {
        $this->logoPath = $logoPath;

        return $this;
    }

    public function getCardImagePath(): ?string
    {
        return $this->cardImagePath;
    }

    public function setCardImagePath(string $cardImagePath): static
    {
        $this->cardImagePath = $cardImagePath;

        return $this;
    }

    public function getHeroBgPath(): ?string
    {
        return $this->heroBgPath;
    }

    public function setHeroBgPath(string $heroBgPath): static
    {
        $this->heroBgPath = $heroBgPath;

        return $this;
    }

    public function getSortOrder(): ?int
    {
        return $this->sortOrder;
    }

    public function setSortOrder(int $sortOrder): static
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }
}
