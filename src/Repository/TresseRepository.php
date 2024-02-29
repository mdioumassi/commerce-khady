<?php

namespace App\Repository;

use App\Entity\Tresse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Tresse>
 *
 * @method Tresse|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tresse|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tresse[]    findAll()
 * @method Tresse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TresseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tresse::class);
    }

    //    /**
    //     * @return Tresse[] Returns an array of Tresse objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('t')
    //            ->andWhere('t.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('t.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Tresse
    //    {
    //        return $this->createQueryBuilder('t')
    //            ->andWhere('t.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
