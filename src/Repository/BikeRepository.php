<?php

namespace App\Repository;

use App\Entity\Bike;
use App\Entity\Marks;
use App\Entity\BikeSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;


/**
 * @method Bike|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bike|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bike[]    findAll()
 * @method Bike[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BikeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bike::class);
    }

    public function findAllVisibleQuery(BikeSearch $search):Query {


          $query = $this
              ->findVisibleQuery()
                //->select('m','p')
                //->join('p.mark', 'm')
             ;

            if($search->getMaxPrice()){
            $query = $query
                ->andWhere('p.price < :maxprice')
                ->setParameter('maxprice',$search->getMaxPrice());
        }
        if($search->getMinPrice()){
            $query = $query
                ->andWhere('p.price >= :minprice')
                ->setParameter('minprice',$search->getMinPrice());
        }


       /* if(!empty($search->getMarke()) ){
            $query = $query

                ->andWhere('m.id IN (:Marke')
                ->setParameter('Marke',$search->getMarke())
            ;
        }*/


        return $query->getQuery();
    }

    public function findVisibleQuery():QueryBuilder
    {
        return $this->createQueryBuilder('p')

            ->where('p.exist = 1');

    }

    public function findLastest():array {
        return $this->findVisibleQuery()
            ->setMaxResults(4)
            ->getQuery()
            ->getResult();
    }



    // /**
    //  * @return Bike[] Returns an array of Bike objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Bike
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
