<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Product>
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    public function salesAmountSumByCategoryQB(): QueryBuilder
    {
        return $this->createQueryBuilder('p')
            ->select('SUM(p.salesAmount) as salesAmountSum, c.name as categoryName')
            ->join('p.category', 'c')
            ->groupBy('c.name')
            ->orderBy('salesAmountSum', 'DESC');
    }
}
