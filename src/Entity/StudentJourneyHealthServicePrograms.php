<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'student_journey_health_service_programs')]
class StudentJourneyHealthServicePrograms
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $type = null; 

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tagLabel = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $servicesList = null; 

    public function getId(): ?int { return $this->id; }
    
    public function getType(): ?string { return $this->type; }
    public function setType(string $type): self { $this->type = $type; return $this; }

    public function getTitle(): ?string { return $this->title; }
    public function setTitle(string $title): self { $this->title = $title; return $this; }

    public function getTagLabel(): ?string { return $this->tagLabel; }
    public function setTagLabel(?string $tagLabel): self { $this->tagLabel = $tagLabel; return $this; }

    public function getServicesList(): ?string { return $this->servicesList; }
    public function setServicesList(string $servicesList): self { $this->servicesList = $servicesList; return $this; }

    public function getServicesArray(): array
    {
        if (empty($this->servicesList)) {
            return [];
        }
        return array_map('trim', explode(',', $this->servicesList));
    }
}