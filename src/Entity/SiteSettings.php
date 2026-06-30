<?php

namespace App\Entity;

use App\Repository\SiteSettingsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SiteSettingsRepository::class)]
class SiteSettings
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $cookieMessage = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cookieButtonText = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isCookieBannerEnabled = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCookieMessage(): ?string
    {
        return $this->cookieMessage;
    }

    public function setCookieMessage(?string $cookieMessage): static
    {
        $this->cookieMessage = $cookieMessage;

        return $this;
    }

    public function getCookieButtonText(): ?string
    {
        return $this->cookieButtonText;
    }

    public function setCookieButtonText(?string $cookieButtonText): static
    {
        $this->cookieButtonText = $cookieButtonText;

        return $this;
    }

    public function isCookieBannerEnabled(): ?bool
    {
        return $this->isCookieBannerEnabled;
    }

    public function setCookieBannerEnabled(?bool $isCookieBannerEnabled): static
    {
        $this->isCookieBannerEnabled = $isCookieBannerEnabled;

        return $this;
    }
}
