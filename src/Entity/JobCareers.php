<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'job_careers')]
class JobCareers
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(name: 'config_key', length: 100, unique: true)]
    private ?string $key = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $value = null;

    #[ORM\Column(length: 255)]
    private ?string $label = null;

    public function getId(): ?int { return $this->id; }
    public function getKey(): ?string { return $this->key; }
    public function setKey(string $key): static { $this->key = $key; return $this; }
    public function getValue(): ?string { return $this->value; }
    public function setValue(?string $value): static { $this->value = $value; return $this; }
    public function getLabel(): ?string { return $this->label; }
    public function setLabel(string $label): static { $this->label = $label; return $this; }
}