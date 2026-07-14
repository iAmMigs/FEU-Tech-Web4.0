<?php

namespace App\Entity;

use App\Repository\StudentJourneySoOrganizationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudentJourneySoOrganizationRepository::class)]
#[ORM\Table(name: 'student_journey_so_organization')]
class StudentJourneySoOrganization
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $abbr = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $logo = null;

    public function getId(): ?int { return $this->id; }
    public function getAbbr(): ?string { return $this->abbr; }
    public function setAbbr(string $abbr): self { $this->abbr = $abbr; return $this; }
    public function getName(): ?string { return $this->name; }
    public function setName(string $name): self { $this->name = $name; return $this; }
    public function getDescription(): ?string { return $this->description; }
    public function setDescription(string $description): self { $this->description = $description; return $this; }
    public function getLogo(): ?string { return $this->logo; }
    public function setLogo(string $logo): self { $this->logo = $logo; return $this; }
}