<?php

namespace App\Repository;

use App\Entity\Candidat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Candidat|null find($id, $lockMode = null, $lockVersion = null)
 * @method Candidat|null findOneBy(array $criteria, array $orderBy = null)
 * @method Candidat[]    findAll()
 * @method Candidat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CandidatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Candidat::class);
    }

    /**
     * @return Candidat[] Returns an array of Candidat objects
     */

    public function findCandidatByEvent($value, $value2)
    {
        return $this->createQueryBuilder('c')
            ->join('c.evenement', 'e')
            ->join('c.user', 'u')
            ->andWhere('e.id = :val')
            ->andWhere('u.id = :id')
            ->setParameter('val', $value)
            ->setParameter('id', $value2)
            //->orderBy('c.id', 'ASC')
            //->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Candidat[] Returns an array of Candidat objects
     */

    public function findCandidatByEventOrga($value)
    {
        return $this->createQueryBuilder('c')
            ->join('c.evenement', 'e')
            ->join('c.user', 'u')
            ->andWhere('e.id = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Candidat[] Returns an array of Candidat objects
     */

    public function findCandidatByAdmin($value)
    {
        return $this->createQueryBuilder('c')
            ->join('c.evenement', 'e')
            ->andWhere('e.id = :val')
            ->setParameter('val', $value)
            //->orderBy('c.id', 'ASC')
            //->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }


    // /**
    //  * @return Candidat[] Returns an array of Candidat objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Candidat
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
