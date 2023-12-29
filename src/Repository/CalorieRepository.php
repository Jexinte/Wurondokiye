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

//    /**
//     * @return Calorie[] Returns an array of Calorie objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Calorie
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
