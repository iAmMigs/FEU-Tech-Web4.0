<?php

namespace App\Repository;

use App\Entity\AcademicsLibrary;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AcademicsLibrary>
 */
class AcademicsLibraryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AcademicsLibrary::class);
    }
}
