<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'about_offices')]
class AboutOffice
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50, unique: true)]
    private ?string $slug = null;

    #[ORM\Column(length: 50)]
    private ?string $navLabel = null;

    #[ORM\Column(length: 255)]
    private ?string $officeTitle = null;

    #[ORM\Column(length: 255)]
    private ?string $officeSubtitle = null;

    #[ORM\Column(length: 255)]
    private ?string $overviewTitle = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $overviewInfo = null;

    #[ORM\Column(length: 255)]
    private ?string $officeLocation = null;

    #[ORM\Column(length: 255)]
    private ?string $officeContact = null;

    #[ORM\Column(length: 255)]
    private ?string $officeEmail = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $officeInfo = null;

    public function getId(): ?int { return $this->id; }

    public function getSlug(): ?string { return $this->slug; }
    public function setSlug(string $slug): self { $this->slug = $slug; return $this; }

    public function getNavLabel(): ?string { return $this->navLabel; }
    public function setNavLabel(string $navLabel): self { $this->navLabel = $navLabel; return $this; }

    public function getOfficeSubtitle(): ?string { return $this->officeSubtitle; }
    public function setOfficeSubtitle(string $officeSubtitle): self { $this->officeSubtitle = $officeSubtitle; return $this; }

    public function getOfficeTitle(): ?string { return $this->officeTitle; }
    public function setOfficeTitle(string $officeTitle): self { $this->officeTitle = $officeTitle; return $this; }

    public function getOverviewTitle(): ?string { return $this->overviewTitle; }
    public function setOverviewTitle(string $overviewTitle): self { $this->overviewTitle = $overviewTitle; return $this; }

    public function getOverviewInfo(): ?string { return $this->overviewInfo; }
    public function setOverviewInfo(string $overviewInfo): self { $this->overviewInfo = $overviewInfo; return $this; }

    public function getOfficeLocation(): ?string { return $this->officeLocation; }
    public function setOfficeLocation(string $officeLocation): self { $this->officeLocation = $officeLocation; return $this; }

    public function getOfficeContact(): ?string { return $this->officeContact; }
    public function setOfficeContact(string $officeContact): self { $this->officeContact = $officeContact; return $this; }

    public function getOfficeEmail(): ?string { return $this->officeEmail; }
    public function setOfficeEmail(string $officeEmail): self { $this->officeEmail = $officeEmail; return $this; }

    public function getOfficeInfo(): ?string { return $this->officeInfo; }
    public function setOfficeInfo(string $officeInfo): self { $this->officeInfo = $officeInfo; return $this; }
}