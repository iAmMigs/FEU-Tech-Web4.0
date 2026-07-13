<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'about_history_footer')]
class HistoryFooter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $logoImage = null;

    #[ORM\Column(length: 10)]
    private ?string $year = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $subtitle = null;

    #[ORM\Column(type: 'text')]
    private ?string $content = null;

    #[ORM\Column(length: 100)]
    private ?string $badgeText = null;

    #[ORM\Column(length: 100)]
    private ?string $footerTagline = null;

    public function getId(): ?int { return $this->id; }
    
    public function getLogoImage(): ?string { return $this->logoImage; }
    public function setLogoImage(?string $logoImage): static { $this->logoImage = $logoImage; return $this; }

    public function getYear(): ?string { return $this->year; }
    public function setYear(string $year): static { $this->year = $year; return $this; }
    
    public function getTitle(): ?string { return $this->title; }
    public function setTitle(string $title): static { $this->title = $title; return $this; }
    
    public function getSubtitle(): ?string { return $this->subtitle; }
    public function setSubtitle(string $subtitle): static { $this->subtitle = $subtitle; return $this; }
    
    public function getContent(): ?string { return $this->content; }
    public function setContent(string $content): static { $this->content = $content; return $this; }
    
    public function getBadgeText(): ?string { return $this->badgeText; }
    public function setBadgeText(string $badgeText): static { $this->badgeText = $badgeText; return $this; }
    
    public function getFooterTagline(): ?string { return $this->footerTagline; }
    public function setFooterTagline(string $footerTagline): static { $this->footerTagline = $footerTagline; return $this; }
}