<?php

namespace App\Repository;

use App\Entity\AdmissionTuitionFees;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AdmissionTuitionFees>
 */
class AdmissionTuitionFeesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AdmissionTuitionFees::class);
    }
}
