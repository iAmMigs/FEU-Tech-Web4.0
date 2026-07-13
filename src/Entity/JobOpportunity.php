<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class JobOpportunity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 50)]
    private ?string $type = null;

    #[ORM\Column(length: 100)]
    private ?string $department = null;

    #[ORM\Column(length: 255)]
    private ?string $mascot = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    /**
     * @var Collection<int, JobQualification>
     */
    #[ORM\OneToMany(targetEntity: JobQualification::class, mappedBy: 'jobOpportunity', cascade: ['persist', 'remove'], orphanRemoval: true)]
    private Collection $qualifications;

    public function __construct()
    {
        $this->qualifications = new ArrayCollection();
    }

    public function getId(): ?int { return $this->id; }
    public function getTitle(): ?string { return $this->title; }
    public function setTitle(string $title): static { $this->title = $title; return $this; }
    public function getType(): ?string { return $this->type; }
    public function setType(string $type): static { $this->type = $type; return $this; }
    public function getDepartment(): ?string { return $this->department; }
    public function setDepartment(string $department): static { $this->department = $department; return $this; }
    public function getMascot(): ?string { return $this->mascot; }
    public function setMascot(string $mascot): static { $this->mascot = $mascot; return $this; }
    public function getImage(): ?string { return $this->image; }
    public function setImage(?string $image): static { $this->image = $image; return $this; }

    /**
     * @return Collection<int, JobQualification>
     */
    public function getQualifications(): Collection { return $this->qualifications; }

    public function addQualification(JobQualification $qualification): static
    {
        if (!$this->qualifications->contains($qualification)) {
            $this->qualifications->add($qualification);
            $qualification->setJobOpportunity($this);
        }
        return $this;
    }

    public function removeQualification(JobQualification $qualification): static
    {
        if ($this->qualifications->removeElement($qualification)) {
            if ($qualification->getJobOpportunity() === $this) {
                $qualification->setJobOpportunity(null);
            }
        }
        return $this;
    }

    public function getQualificationsText(): string
    {
        $lines = [];
        foreach ($this->qualifications as $qual) {
            $lines[] = $qual->getQualification();
        }
        return implode("\n", $lines);
    }

    public function setQualificationsText(?string $text): static
    {
        $this->qualifications->clear();

        if (empty($text)) {
            return $this;
        }

        $lines = array_filter(array_map('trim', explode("\n", $text)));
        foreach ($lines as $line) {
            $qualEntity = new JobQualification();
            $qualEntity->setQualification($line);
            $this->addQualification($qualEntity);
        }

        return $this;
    }
}