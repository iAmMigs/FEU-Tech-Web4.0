<?php

namespace App\Twig\Extension;

use App\Entity\SiteSettings;
use Doctrine\ORM\EntityManagerInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('get_site_settings', [$this, 'getSiteSettings']),
        ];
    }

    public function getSiteSettings(): ?SiteSettings
    {
        $settings = $this->entityManager->getRepository(SiteSettings::class)->findAll();
        
        if (count($settings) > 0) {
            return $settings[0];
        }

        // Fallback: instantiate in-memory default settings if DB is empty
        $defaultSettings = new SiteSettings();
        $defaultSettings->setCookieBannerEnabled(true);
        $defaultSettings->setCookieButtonText('Accept');
        $defaultSettings->setCookieMessage('We use cookies to make websites work efficiently, as well as to provide information to the owners of the website.');
        
        return $defaultSettings;
    }
}
