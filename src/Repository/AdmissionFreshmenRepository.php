<?php

namespace App\Repository;

use App\Entity\AdmissionFreshmen;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class AdmissionFreshmenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AdmissionFreshmen::class);
    }
}
