<?php

namespace App\Repository;

use App\Entity\Presentation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Presentation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Presentation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Presentation[]    findAll()
 * @method Presentation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PresentationRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Presentation::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('p')
            ->where('p.something = :value')->setParameter('value', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
