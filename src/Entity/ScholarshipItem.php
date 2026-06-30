<?php

namespace App\Entity;

use App\Repository\ScholarshipItemRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ScholarshipItemRepository::class)]
class ScholarshipItem
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $coverage = null;

    #[ORM\Column(length: 255)]
    private ?string $category = null;

    #[ORM\Column(type: Types::SIMPLE_ARRAY, nullable: true)]
    private array $requirements = [];

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

    public function getCoverage(): ?string
    {
        return $this->coverage;
    }

    public function setCoverage(string $coverage): static
    {
        $this->coverage = $coverage;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getRequirements(): array
    {
        return $this->requirements;
    }

    public function setRequirements(?array $requirements): static
    {
        $this->requirements = $requirements ?? [];

        return $this;
    }
}
