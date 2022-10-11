<?php

namespace App\Repository;

use DateTime;
use App\Entity\Partenaire;
use Doctrine\Persistence\ManagerRegistry;
use Date;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Partenaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method Partenaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method Partenaire[]    findAll()
 * @method Partenaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PartenaireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Partenaire::class);
    }

    public function findPartenaireEvent()
    {
        return $this->createQueryBuilder('p')
            ->join('p.users', 'u')
            ->join('u.evenements', 'e')
            //->select('p.organisme')
            ->andWhere('e.debut < current_timestamp()')
            //->andwhere("date_add(e.debut, 1, 'year') >= current_timestamp()") 
            ->andWhere('e.debut >= :val')
            ->setParameter('val', "new DateTime()->modify('-1 year')")
            ->orderBy('e.debut', 'DESC')
            ->setMaxResults(5)
            ->getQuery()
            ->getResult();
    }

    // public function findPartenaireEvent()
    // {
    //     //$debut = new DateTime();
    //     //$debut->('CURRENT_TIMESTAMP', 'DATE');
    //     //$debut2 = $debut->format('Y-m-d');
    //     //$fin = $debut->modify('-1 year');
    //     //$fin2 = $fin->format('Y-m-d');
    //     //dd($fin2);
    //     return $this->createQueryBuilder('p')
    //         ->join('p.users', 'u')
    //         ->join('u.evenements', 'e')
    //         //->select('p.organisme')
    //         ->andWhere('e.debut < :debut')
    //         //->andWhere('e.debut > :fin')
    //         //->setParameter('fin', $fin)
    //         ->setParameter('debut', date('Y-m-d'))
    //         //->orderBy('e.debut', 'DESC')
    //         //->setMaxResults(5)
    //         ->getQuery()
    //         ->getResult();
    // }

    // /**
    //  * @return Partenaire[] Returns an array of Partenaire objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Partenaire
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
