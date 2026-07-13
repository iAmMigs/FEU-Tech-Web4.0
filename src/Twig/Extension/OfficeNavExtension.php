<?php

namespace App\Twig\Extension; // Make sure this matches your exact folder structure!

use App\Entity\AboutOffice;
use Doctrine\ORM\EntityManagerInterface;
use Twig\Extension\AbstractExtension;
use Twig\Extension\GlobalsInterface;

class OfficeNavExtension extends AbstractExtension implements GlobalsInterface
{
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getGlobals(): array
    {
        $offices = $this->em->getRepository(AboutOffice::class)->findBy([], ['navLabel' => 'ASC']);
        
        return [
            'global_nav_offices' => $offices
        ];
    }
}