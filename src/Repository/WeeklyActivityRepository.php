<?php

namespace App\Repository;

use App\Entity\WeeklyActivity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<WeeklyActivity>
 *
 * @method WeeklyActivity|null find($id, $lockMode = null, $lockVersion = null)
 * @method WeeklyActivity|null findOneBy(array $criteria, array $orderBy = null)
 * @method WeeklyActivity[]    findAll()
 * @method WeeklyActivity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WeeklyActivityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WeeklyActivity::class);
    }
}
