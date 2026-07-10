<?php

namespace App\Repository;

use App\Entity\ProgramLaboratory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProgramLaboratory>
 */
class ProgramLaboratoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProgramLaboratory::class);
    }
}
