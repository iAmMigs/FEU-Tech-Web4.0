<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'about_history_item')]
class HistoryItem
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $year = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: 'text')]
    private ?string $content = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tag = null;

    #[ORM\Column(length: 255)]
    private ?string $iconImage = null;

    #[ORM\Column(length: 50)]
    private ?string $theme = 'gold'; 

    public function getId(): ?int { return $this->id; }
    
    public function getYear(): ?string { return $this->year; }
    public function setYear(string $year): static { $this->year = $year; return $this; }
    
    public function getTitle(): ?string { return $this->title; }
    public function setTitle(string $title): static { $this->title = $title; return $this; }
    
    public function getContent(): ?string { return $this->content; }
    public function setContent(string $content): static { $this->content = $content; return $this; }
    
    public function getTag(): ?string { return $this->tag; }
    public function setTag(?string $tag): static { $this->tag = $tag; return $this; }
    
    public function getIconImage(): ?string { return $this->iconImage; }
    public function setIconImage(?string $iconImage): static { $this->iconImage = $iconImage; return $this; }
    
    public function getTheme(): ?string { return $this->theme; }
    public function setTheme(string $theme): static { $this->theme = $theme; return $this; }
}