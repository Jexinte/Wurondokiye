<?php

namespace App\Repository;

use App\Entity\Calorie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Calorie>
 *
 * @method Calorie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Calorie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Calorie[]    findAll()
 * @method Calorie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CalorieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Calorie::class);
    }


}
