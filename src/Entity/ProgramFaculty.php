<?php

namespace App\Entity;

use App\Repository\ProgramFacultyRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProgramFacultyRepository::class)]
class ProgramFaculty
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'faculty')]
    #[ORM\JoinColumn(nullable: false)]
    private ?AcademicsProgram $program = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $role = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $information1 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $specialization = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $information2 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $affiliation = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;
        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(?string $role): static
    {
        $this->role = $role;
        return $this;
    }

    public function getInformation1(): ?string
    {
        return $this->information1;
    }

    public function setInformation1(?string $information1): static
    {
        $this->information1 = $information1;
        return $this;
    }

    public function getSpecialization(): ?string
    {
        return $this->specialization;
    }

    public function setSpecialization(?string $specialization): static
    {
        $this->specialization = $specialization;
        return $this;
    }

    public function getInformation2(): ?string
    {
        return $this->information2;
    }

    public function setInformation2(?string $information2): static
    {
        $this->information2 = $information2;
        return $this;
    }

    public function getAffiliation(): ?string
    {
        return $this->affiliation;
    }

    public function setAffiliation(?string $affiliation): static
    {
        $this->affiliation = $affiliation;
        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;
        return $this;
    }

    public function __toString(): string
    {
        return $this->name ?? '';
    }
}
