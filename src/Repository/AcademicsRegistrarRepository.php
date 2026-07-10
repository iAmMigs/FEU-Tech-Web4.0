<?php

namespace App\Repository;

use App\Entity\AcademicsRegistrar;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AcademicsRegistrar>
 */
class AcademicsRegistrarRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AcademicsRegistrar::class);
    }
}
