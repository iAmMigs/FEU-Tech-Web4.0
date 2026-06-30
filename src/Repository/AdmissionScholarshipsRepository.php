<?php

namespace App\Repository;

use App\Entity\AdmissionScholarships;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AdmissionScholarships>
 */
class AdmissionScholarshipsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AdmissionScholarships::class);
    }
}
