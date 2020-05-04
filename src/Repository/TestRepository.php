<?php

namespace App\Repository;

use App\Data\SearchData;
use App\Entity\Bike;
use App\Entity\Test;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;

/**
 * @method Test|null find($id, $lockMode = null, $lockVersion = null)
 * @method Test|null findOneBy(array $criteria, array $orderBy = null)
 * @method Test[]    findAll()
 * @method Test[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TestRepository extends ServiceEntityRepository
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
                ->setParameter('minp rice',$search->min);
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
}
