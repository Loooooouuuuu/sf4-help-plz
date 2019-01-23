<?php

namespace App\Repository;

use App\Entity\TestParent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TestParent|null find($id, $lockMode = null, $lockVersion = null)
 * @method TestParent|null findOneBy(array $criteria, array $orderBy = null)
 * @method TestParent[]    findAll()
 * @method TestParent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TestParentRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TestParent::class);
    }

    // /**
    //  * @return TestParent[] Returns an array of TestParent objects
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
    public function findOneBySomeField($value): ?TestParent
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
