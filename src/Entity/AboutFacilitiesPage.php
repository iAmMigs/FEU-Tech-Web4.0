<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'about_facilities_page')]
class AboutFacilitiesPage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $heroTag = null;

    #[ORM\Column(length: 255)]
    private ?string $heroTitleWhite = null;

    #[ORM\Column(length: 255)]
    private ?string $heroTitleYellow = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $heroDescription = null;

    #[ORM\Column(length: 255)]
    private ?string $tourBadge = null;

    #[ORM\Column(length: 255)]
    private ?string $videoPath = null;

    public function getId(): ?int { return $this->id; }
    public function getHeroTag(): ?string { return $this->heroTag; }
    public function setHeroTag(string $heroTag): self { $this->heroTag = $heroTag; return $this; }
    public function getHeroTitleWhite(): ?string { return $this->heroTitleWhite; }
    public function setHeroTitleWhite(string $heroTitleWhite): self { $this->heroTitleWhite = $heroTitleWhite; return $this; }
    public function getHeroTitleYellow(): ?string { return $this->heroTitleYellow; }
    public function setHeroTitleYellow(string $heroTitleYellow): self { $this->heroTitleYellow = $heroTitleYellow; return $this; }
    public function getHeroDescription(): ?string { return $this->heroDescription; }
    public function setHeroDescription(string $heroDescription): self { $this->heroDescription = $heroDescription; return $this; }
    public function getTourBadge(): ?string { return $this->tourBadge; }
    public function setTourBadge(string $tourBadge): self { $this->tourBadge = $tourBadge; return $this; }
    public function getVideoPath(): ?string { return $this->videoPath; }
    public function setVideoPath(string $videoPath): self { $this->videoPath = $videoPath; return $this; }
}