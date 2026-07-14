<?php

namespace App\Entity;

use App\Repository\StudentJourneyIcareServicesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudentJourneyIcareServicesRepository::class)]
#[ORM\Table(name: 'student_journey_icare_services')]
class StudentJourneyIcareServices
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = NULL;

    #[ORM\Column(length: 255)]
    private ?string $title = NULL;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = NULL;

    #[ORM\Column(length: 50)]
    private ?string $iconChoice = NULL;

    public function getId(): ?int { return $this->id; }
    public function getTitle(): ?string { return $this->title; }
    public function setTitle(string $title): self { $this->title = $title; return $this; }
    public function getDescription(): ?string { return $this->description; }
    public function setDescription(string $description): self { $this->description = $description; return $this; }
    public function getIconChoice(): ?string { return $this->iconChoice; }
    public function setIconChoice(string $iconChoice): self { $this->iconChoice = $iconChoice; return $this; }
}