<?php

namespace App\Repository;

use App\Entity\Savon;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Savon>
 *
 * @method Savon|null find($id, $lockMode = null, $lockVersion = null)
 * @method Savon|null findOneBy(array $criteria, array $orderBy = null)
 * @method Savon[]    findAll()
 * @method Savon[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SavonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Savon::class);
    }

    //    /**
    //     * @return Savon[] Returns an array of Savon objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('s.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Savon
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
