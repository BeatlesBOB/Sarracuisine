<?php

namespace App\Repository;

use App\Entity\Product;
use App\Entity\Types;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    /**
     * @return Product[] Returns an array of Product objects
     */

    public function findByTypes($value)
    {
        return $this->createQueryBuilder('p')
            ->innerJoin('p.types', 't')
            ->where('LOWER(t.title) = LOWER(:val)')
            ->setParameter('val', $value)
            ->getQuery()->getResult();
    }

    /**
     * @return Product[] Returns an array of Product objects
     */
    public function getMostPopularArticles()
    {
        return $this->createQueryBuilder('p')
            ->orderBy('p.viewed', 'DESC')
            ->setMaxResults(4)
            ->getQuery()
            ->execute();
    }

//
//->andWhere('p.exampleField = :val')
//->join()
//->setParameter('val', $value)
//->orderBy('p.id', 'ASC')
//->setMaxResults(10)
//->getQuery()
//->getResult()
//$idTypes = $this->createQueryBuilder('p')
//->select('t.id')
//->from('Types','t')
//->andWhere('p.title = :val')
//->setParameter('val', $value)
//->getQuery()
//->getResult()
//;
//return $this->createQueryBuilder('p')
//->andWhere('p.exampleField = :val')
//->setParameter('val', $value)
//->getQuery()
//->getOneOrNullResult()
//;
    /*
    public function findOneBySomeField($value): ?Product
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
