<?php

namespace App\Repository;

use App\Entity\MonthlyActivity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MonthlyActivity>
 *
 * @method MonthlyActivity|null find($id, $lockMode = null, $lockVersion = null)
 * @method MonthlyActivity|null findOneBy(array $criteria, array $orderBy = null)
 * @method MonthlyActivity[]    findAll()
 * @method MonthlyActivity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MonthlyActivityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MonthlyActivity::class);
    }
}
