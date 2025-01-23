<?php

namespace App\Repository;

use App\Entity\Packs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Packs>
 */
class PacksRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Packs::class);
    }

    public function countCardsInPack(int $packId): int
    {
        return $this->createQueryBuilder('p')
            ->select('COUNT(c.id)')
            ->leftJoin('p.cards', 'c')
            ->where('p.id = :packId')
            ->setParameter('packId', $packId)
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function countTotalCardsInPack(): array
    {
        return $this->createQueryBuilder('p')
            ->select('p.id, p.name, COUNT(c.id) as total_count')
            ->leftJoin('p.cards', 'c')
            ->groupBy('p.id')
            ->getQuery()
            ->getResult();
    }
//    /**
//     * @return Packs[] Returns an array of Packs objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Packs
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
