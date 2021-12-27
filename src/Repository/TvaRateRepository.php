<?php

namespace App\Repository;

use App\Entity\TvaRate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TvaRate|null find($id, $lockMode = null, $lockVersion = null)
 * @method TvaRate|null findOneBy(array $criteria, array $orderBy = null)
 * @method TvaRate[]    findAll()
 * @method TvaRate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TvaRateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TvaRate::class);
    }

    // /**
    //  * @return TvaRate[] Returns an array of TvaRate objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TvaRate
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
