<?php

namespace App\Repository;

use App\Data\SearchData;
use App\Entity\Bike;

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

    public function findAllVisibleQuery(SearchData $search):Query {


          $query = $this
              ->findVisibleQuery()
                ->select('m','p')
                ->join('p.mark', 'm')
             ;

            if($search->max){
            $query = $query
                ->andWhere('p.price < :maxprice')
                ->setParameter('maxprice',$search->max);
        }
        if($search->min){
            $query = $query
                ->andWhere('p.price >= :minprice')
                ->setParameter('minprice',$search->min);
        }


        if(!empty($search->marke) ){
            $query = $query

                ->andWhere('m.id IN (:Marke)')
                ->setParameter('Marke',$search->marke)
            ;
        }


        return $query->getQuery();
    }

    public function findVisibleQuery():QueryBuilder
    {
        return $this->createQueryBuilder('p')

            ->where('p.exist = 1');

    }

    public function findLastest():array {
        return $this->findVisibleQuery()
            ->setMaxResults(12)
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
