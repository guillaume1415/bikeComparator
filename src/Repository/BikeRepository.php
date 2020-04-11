<?php

namespace App\Repository;

use App\Entity\Bike;
use App\Entity\Marks;
//use App\Entity\BikeSearch;
use App\Data\SearchData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Query;

use Knp\Component\Pager\PaginatorInterface;
use Knp\Component\Pager\Pagination\PaginationInterface;

/**
 * @method Bike|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bike|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bike[]    findAll()
 * @method Bike[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BikeRepository extends ServiceEntityRepository
{
    /**
     * @return PaginatorInterface
     */
    private $paginator;

    public function __construct(ManagerRegistry $registry, PaginatorInterface $paginator)
    {
        parent::__construct($registry, Bike::class);
        $this->paginator = $paginator;
    }

    /**
     * @param SearchData $search
     * @return PaginationInterface
     */
    public function findAllVisibleQuery(SearchData $search):paginationInterface
    {
            $query = $this
              ->createQueryBuilder('p')
             // ->findVisibleQuery()
            ->select('c','p')
            ->join('p.mark', 'c');
            if(!empty($search->max)){
            $query = $query
                ->andWhere('p.price < :maxprice')
                ->setParameter('maxprice',$search->max);
            }
            if(!empty($search->min)){
                $query = $query
                    ->andWhere('p.price >= :minprice')
                    ->setParameter('minprice',$search->min);
            }
            if(!empty($search->marke)){
                $query = $query
                    ->andWhere('c.id IN (:categories)')
                    ->setParameter('categories', $search->marke);
            }
        $query =  $query->getQuery();
            return $this->paginator->paginate(
                $query,
                $search->page ,
                12
            );
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
