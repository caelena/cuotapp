<?php

namespace App\Repository;

use App\Entity\AnnualActivity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AnnualActivity>
 *
 * @method AnnualActivity|null find($id, $lockMode = null, $lockVersion = null)
 * @method AnnualActivity|null findOneBy(array $criteria, array $orderBy = null)
 * @method AnnualActivity[]    findAll()
 * @method AnnualActivity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnnualActivityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AnnualActivity::class);
    }
}
