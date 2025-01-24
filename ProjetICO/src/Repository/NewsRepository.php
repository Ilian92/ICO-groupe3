<?php

namespace App\Repository;

use App\Entity\News;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<News>
 */
class NewsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, News::class);
    }

    public function findByStatus(string $status): array
    {
        return $this->createQueryBuilder('n')
            ->join('n.status_id', 's')
            ->andWhere('s.name = :status')
            ->setParameter('status', $status)
            ->orderBy('n.created_at', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
