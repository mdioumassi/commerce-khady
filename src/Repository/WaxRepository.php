<?php

namespace App\Repository;

use App\Entity\Wax;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Wax>
 *
 * @method Wax|null find($id, $lockMode = null, $lockVersion = null)
 * @method Wax|null findOneBy(array $criteria, array $orderBy = null)
 * @method Wax[]    findAll()
 * @method Wax[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WaxRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Wax::class);
    }

    //    /**
    //     * @return Wax[] Returns an array of Wax objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('w')
    //            ->andWhere('w.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('w.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Wax
    //    {
    //        return $this->createQueryBuilder('w')
    //            ->andWhere('w.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
