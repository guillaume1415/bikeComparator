<?php

namespace App\Repository;

use App\Entity\Testbike;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Testbike|null find($id, $lockMode = null, $lockVersion = null)
 * @method Testbike|null findOneBy(array $criteria, array $orderBy = null)
 * @method Testbike[]    findAll()
 * @method Testbike[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TestbikeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Testbike::class);
    }

    // /**
    //  * @return Testbike[] Returns an array of Testbike objects
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
    public function findOneBySomeField($value): ?Testbike
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
