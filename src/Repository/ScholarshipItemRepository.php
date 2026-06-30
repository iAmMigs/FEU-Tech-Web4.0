<?php

namespace App\Repository;

use App\Entity\ScholarshipItem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ScholarshipItem>
 */
class ScholarshipItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ScholarshipItem::class);
    }
}
