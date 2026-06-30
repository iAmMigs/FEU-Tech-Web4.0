<?php

namespace App\Repository;

use App\Entity\AdmissionFaqs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AdmissionFaqs>
 */
class AdmissionFaqsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AdmissionFaqs::class);
    }
}
