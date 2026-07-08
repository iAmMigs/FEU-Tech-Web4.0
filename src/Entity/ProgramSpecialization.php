<?php

namespace App\Entity;

use App\Repository\ProgramSpecializationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProgramSpecializationRepository::class)]
class ProgramSpecialization
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'specializations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?AcademicsProgram $program = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProgram(): ?AcademicsProgram
    {
        return $this->program;
    }

    public function setProgram(?AcademicsProgram $program): static
    {
        $this->program = $program;
        return $this;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;
        return $this;
    }

    public function __toString(): string
    {
        return $this->title ?? '';
    }
}
