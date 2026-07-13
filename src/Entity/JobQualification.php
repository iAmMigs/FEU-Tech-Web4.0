<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class JobQualification
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'qualifications')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?JobOpportunity $jobOpportunity = null;

    #[ORM\Column(type: 'text')]
    private ?string $qualification = null;

    public function getId(): ?int { return $this->id; }
    public function getJobOpportunity(): ?JobOpportunity { return $this->jobOpportunity; }
    public function setJobOpportunity(?JobOpportunity $jobOpportunity): static { $this->jobOpportunity = $jobOpportunity; return $this; }
    public function getQualification(): ?string { return $this->qualification; }
    public function setQualification(string $qualification): static { $this->qualification = $qualification; return $this; }

    public function __toString(): string
    {
        return $this->qualification ?? '';
    }
}