<?php

namespace App\Repository;

use App\Entity\Invoice;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Invoice>
 */
class InvoiceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Invoice::class);
    }


    public function findInvoicesWithUser() {
        return $this->createQueryBuilder('invoice')
            ->leftJoin('invoice.createdBy', 'user')
            ->addSelect('user')
            ->getQuery()
            ->getResult();
    }
}
