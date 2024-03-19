<?php

namespace App\Repository;

use App\Entity\BillingAdress;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BillingAdress>
 *
 * @method BillingAdress|null find($id, $lockMode = null, $lockVersion = null)
 * @method BillingAdress|null findOneBy(array $criteria, array $orderBy = null)
 * @method BillingAdress[]    findAll()
 * @method BillingAdress[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BillingAdressRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BillingAdress::class);
    }

    //    /**
    //     * @return BillingAdress[] Returns an array of BillingAdress objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('b.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?BillingAdress
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
