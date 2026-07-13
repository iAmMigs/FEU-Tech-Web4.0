<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'about_vision_mision')]
class AboutVisionMision
{
#[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $heroTitle = null;

    #[ORM\Column(length: 255)]
    private ?string $heroTitleHighlight = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $heroDescription = null;

    #[ORM\Column(length: 255)]
    private ?string $titleOne = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $titleOneText = null;

    #[ORM\Column(length: 255)]
    private ?string $titleTwo = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $titleTwoText = null;

    #[ORM\Column(length: 255)]
    private ?string $titleThree = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $titleThreeText = null;

    #[ORM\Column(type: Types::JSON)]
    private array $titleThreeCommitments = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHeroSubtitle(): ?string
    {
        return $this->heroSubtitle;
    }

    public function setHeroSubtitle(string $heroSubtitle): self
    {
        $this->heroSubtitle = $heroSubtitle;
        return $this;
    }

    public function getHeroTitle(): ?string
    {
        return $this->heroTitle;
    }

    public function setHeroTitle(string $heroTitle): self
    {
        $this->heroTitle = $heroTitle;
        return $this;
    }

    public function getHeroTitleHighlight(): ?string
    {
        return $this->heroTitleHighlight;
    }

    public function setHeroTitleHighlight(string $heroTitleHighlight): self
    {
        $this->heroTitleHighlight = $heroTitleHighlight;
        return $this;
    }

    public function getHeroDescription(): ?string
    {
        return $this->heroDescription;
    }

    public function setHeroDescription(string $heroDescription): self
    {
        $this->heroDescription = $heroDescription;
        return $this;
    }

    public function getTitleOne(): ?string
    {
        return $this->titleOne;
    }

    public function setTitleOne(string $titleOne): self
    {
        $this->titleOne = $titleOne;
        return $this;
    }

    public function getTitleOneText(): ?string
    {
        return $this->titleOneText;
    }

    public function setTitleOneText(string $titleOneText): self
    {
        $this->titleOneText = $titleOneText;
        return $this;
    }

    public function getTitleTwo(): ?string
    {
        return $this->titleTwo;
    }

    public function setTitleTwo(string $titleTwo): self
    {
        $this->titleTwo = $titleTwo;
        return $this;
    }

    public function getTitleTwoText(): ?string
    {
        return $this->titleTwoText;
    }

    public function setTitleTwoText(string $titleTwoText): self
    {
        $this->titleTwoText = $titleTwoText;
        return $this;
    }

    public function getTitleThree(): ?string
    {
        return $this->titleThree;
    }

    public function setTitleThree(string $titleThree): self
    {
        $this->titleThree = $titleThree;
        return $this;
    }

    public function getTitleThreeText(): ?string
    {
        return $this->titleThreeText;
    }

    public function setTitleThreeText(string $titleThreeText): self
    {
        $this->titleThreeText = $titleThreeText;
        return $this;
    }

    public function getTitleThreeCommitments(): array
    {
        return $this->titleThreeCommitments;
    }

    public function setTitleThreeCommitments(array $titleThreeCommitments): self
    {
        $this->titleThreeCommitments = $titleThreeCommitments;
        return $this;
    }
}