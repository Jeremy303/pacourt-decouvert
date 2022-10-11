<?php

namespace App\Repository;

use App\Entity\Evenement;
use DateTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Evenement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Evenement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Evenement[]    findAll()
 * @method Evenement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EvenementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Evenement::class);
    }

    public function findEvenementFuture()
    {
        $now = date("Y-m-d");
        return $this->createQueryBuilder('e')
            ->andWhere ("e.fin >= '" . $now . "'")
            ->orderBy('e.debut', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findEvenementPasse($user)
    {
        $now = date("Y-m-d");
        if ($user) {

            $qb = $this->createQueryBuilder('e')
                ->andWhere("e.fin <= '" . $now . "'");

            if (in_array("ROLE_ORGANISATEUR",$user->getRoles())) {
                
                $qb
                    ->join('e.user', 'u')
                    ->join('u.partenaire', 'p')
                    ->andWhere('p.id = :val')
                    ->setParameter('val', $user->getPartenaire());
            }
            
            return $qb
                ->orderBy('e.debut', 'ASC')
                ->getQuery()
                ->getResult();


        }
    }

    public function findEvenementOrganisateurFuture($val)
    {
        $now = date("Y-m-d");
        return $this->createQueryBuilder('e')
            ->join('e.user', 'd')
            ->andWhere("e.fin >= '" . $now . "'")
            ->andWhere('d.id = :val')
            ->setParameter('val', $val)
            ->orderBy('e.debut', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findEvenementOrganisateurPasse($val)
    {
        return $this->createQueryBuilder('e')
            ->join('e.user', 'd')
            ->andWhere('e.debut < current_timestamp()')
            ->andWhere('d.id = :val')
            ->setParameter('val', $val)
            ->orderBy('e.debut', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function countCandidat($value)
    {
        return count($this->createQueryBuilder('c')

            ->join('c.candidats', 'd')
            ->select('d.nom')
            ->andWhere('c.id = :val')
            ->setParameter('val', $value)
            //->orderBy('c.id', 'ASC')
            //->setMaxResults(10)
            ->getQuery()
            ->getResult());
    }

    public function findByUser($user)
    {
        // $now = date("Y-m-d");
        return $this->createQueryBuilder('e')
            ->join('e.user', 'u')
            ->join('u.partenaire', 'p')
            ->andWhere('p.id = :val')
            // ->andWhere ("e.fin >= '" . $now . "'")
            ->setParameter('val', $user->getPartenaire())
            ->getQuery()
            ->getResult();

    }


    // /**
    //  * @return Evenement[] Returns an array of Evenement objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Evenement
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
