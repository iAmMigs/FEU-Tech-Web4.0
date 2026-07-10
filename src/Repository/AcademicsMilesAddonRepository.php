<?php

namespace App\Repository;

use App\Entity\AcademicsMilesAddon;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AcademicsMilesAddon>
 */
class AcademicsMilesAddonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AcademicsMilesAddon::class);
    }
}
