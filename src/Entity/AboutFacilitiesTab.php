<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'about_facilities_tabs')]
class AboutFacilitiesTab
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $sortOrder = 0;

    #[ORM\Column(length: 255)]
    private ?string $navTitle = null;

    #[ORM\Column(length: 255)]
    private ?string $navSubtitle = null;

    #[ORM\Column(length: 255)]
    private ?string $contentBadge = null;

    #[ORM\Column(length: 255)]
    private ?string $contentTitle = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $descriptionMarkdown = null;

    #[ORM\Column(length: 255)]
    private ?string $imgOne = null;

    #[ORM\Column(length: 255)]
    private ?string $imgTwo = null;

    #[ORM\Column(length: 255)]
    private ?string $imgThree = null;

    #[ORM\Column(length: 100)]
    private ?string $statOneTitle = null;

    #[ORM\Column(length: 255)]
    private ?string $statOneDesc = null;

    #[ORM\Column(length: 100)]
    private ?string $statTwoTitle = null;

    #[ORM\Column(length: 255)]
    private ?string $statTwoDesc = null;

    #[ORM\Column(length: 100)]
    private ?string $statThreeTitle = null;

    #[ORM\Column(length: 255)]
    private ?string $statThreeDesc = null;

    public function getId(): ?int { return $this->id; }
    public function getSortOrder(): ?int { return $this->sortOrder; }
    public function setSortOrder(int $sortOrder): self { $this->sortOrder = $sortOrder; return $this; }
    public function getNavTitle(): ?string { return $this->navTitle; }
    public function setNavTitle(string $navTitle): self { $this->navTitle = $navTitle; return $this; }
    public function getNavSubtitle(): ?string { return $this->navSubtitle; }
    public function setNavSubtitle(string $navSubtitle): self { $this->navSubtitle = $navSubtitle; return $this; }
    public function getContentBadge(): ?string { return $this->contentBadge; }
    public function setContentBadge(string $contentBadge): self { $this->contentBadge = $contentBadge; return $this; }
    public function getContentTitle(): ?string { return $this->contentTitle; }
    public function setContentTitle(string $contentTitle): self { $this->contentTitle = $contentTitle; return $this; }
    public function getDescriptionMarkdown(): ?string { return $this->descriptionMarkdown; }
    public function setDescriptionMarkdown(string $descriptionMarkdown): self { $this->descriptionMarkdown = $descriptionMarkdown; return $this; }
    
    public function getImgOne(): ?string { return $this->imgOne; }
    public function setImgOne(string $imgOne): self { $this->imgOne = $imgOne; return $this; }
    public function getImgTwo(): ?string { return $this->imgTwo; }
    public function setImgTwo(string $imgTwo): self { $this->imgTwo = $imgTwo; return $this; }
    public function getImgThree(): ?string { return $this->imgThree; }
    public function setImgThree(string $imgThree): self { $this->imgThree = $imgThree; return $this; }

    public function getStatOneTitle(): ?string { return $this->statOneTitle; }
    public function setStatOneTitle(string $statOneTitle): self { $this->statOneTitle = $statOneTitle; return $this; }
    public function getStatOneDesc(): ?string { return $this->statOneDesc; }
    public function setStatOneDesc(string $statOneDesc): self { $this->statOneDesc = $statOneDesc; return $this; }
    public function getStatTwoTitle(): ?string { return $this->statTwoTitle; }
    public function setStatTwoTitle(string $statTwoTitle): self { $this->statTwoTitle = $statTwoTitle; return $this; }
    public function getStatTwoDesc(): ?string { return $this->statTwoDesc; }
    public function setStatTwoDesc(string $statTwoDesc): self { $this->statTwoDesc = $statTwoDesc; return $this; }
    public function getStatThreeTitle(): ?string { return $this->statThreeTitle; }
    public function setStatThreeTitle(string $statThreeTitle): self { $this->statThreeTitle = $statThreeTitle; return $this; }
    public function getStatThreeDesc(): ?string { return $this->statThreeDesc; }
    public function setStatThreeDesc(string $statThreeDesc): self { $this->statThreeDesc = $statThreeDesc; return $this; }
}