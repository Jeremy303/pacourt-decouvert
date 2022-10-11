<?php

namespace App\DataFixtures;

use App\Entity\Candidat;
use DateTime;
use App\Entity\User;
use App\Entity\Evenement;
use App\Entity\Partenaire;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $ph;

    public function __construct(UserPasswordHasherInterface $passwordHasher) {

        $this->ph = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        // USER 1 ADMIN
        $user = new User();
        $user->setEmail("admin@afpa.fr");
        $user->setRoles(["ROLE_ADMIN", "ROLE_ALLOWED_TO_SWITCH"]);
        $plainPassword = "1234";
        $hashedPassword = $this->ph->hashPassword($user,$plainPassword);
        $user->setPassword($hashedPassword);
        $user->setNom("Pennyworth");
        $user->setPrenom("Alfred");

        $manager->persist($user);

        // USER 2 ORGA
        $user2 = new User();
        $user2->setEmail("organisateur@afpa.fr");
        $user2->setRoles(["ROLE_ORGANISATEUR"]);
        $plainPassword = "1234";
        $hashedPassword = $this->ph->hashPassword($user2,$plainPassword);
        $user2->setPassword($hashedPassword);
        $user2->setNom("Wayne");
        $user2->setPrenom("Bruce");

        $manager->persist($user2);

        // USER 3 PRESCRI
        $user3 = new User();
        $user3->setEmail("prescripteur@afpa.fr");
        $user3->setRoles(["ROLE_PRESCRIPTEUR"]);
        $plainPassword = "1234";
        $hashedPassword = $this->ph->hashPassword($user3,$plainPassword);
        $user3->setPassword($hashedPassword);
        $user3->setNom("Brucelee");
        $user3->setPrenom("Marion");

        $manager->persist($user3);


        // USER 4 PRESCRI
        $user4 = new User();
        $user4->setEmail("prescripteur2@afpa.fr");
        $user4->setRoles(["ROLE_PRESCRIPTEUR"]);
        $plainPassword = "1234";
        $hashedPassword = $this->ph->hashPassword($user4,$plainPassword);
        $user4->setPassword($hashedPassword);
        $user4->setNom("Crombie");
        $user4->setPrenom("Albert");

        $manager->persist($user4);


        // USER 5 PRESCRI
        $user5 = new User();
        $user5->setEmail("prescripteur3@afpa.fr");
        $user5->setRoles(["ROLE_PRESCRIPTEUR"]);
        $plainPassword = "1234";
        $hashedPassword = $this->ph->hashPassword($user5,$plainPassword);
        $user5->setPassword($hashedPassword);
        $user5->setNom("Carrey");
        $user5->setPrenom("Jim");

        $manager->persist($user5);

        //EVENEMENT
        $evt = new Evenement();
        $evt->setNom("test");
        $evt->setDebut(new DateTime("2022-05-15"));
        $evt->setFin(new DateTime("2022-05-30"));
        $evt->setAdresse("rue du bas");
        $evt->setPlaces(12);
        $evt->setDescription("bla bla bla");
        $evt->setVille("Amiens");
        $evt->setCodePostal("80000");
        $evt->setUser($user2);

        $manager->persist($evt);

         //EVENEMENT 2
        $evt2 = new Evenement();
        $evt2->setNom("test");
        $evt2->setDebut(new DateTime("2022-05-15"));
        $evt2->setFin(new DateTime("2022-05-30"));
        $evt2->setAdresse("rue du bas");
        $evt2->setPlaces(12);
        $evt2->setDescription("bla bla bla");
        $evt2->setVille("Amiens");
        $evt2->setCodePostal("80000");
        $evt2->setUser($user2);

        $manager->persist($evt2);


        // USER 6 ORGA
        $user6 = new User();
        $user6->setEmail("organisateur2@afpa.fr");
        $user6->setRoles(["ROLE_ORGANISATEUR"]);
        $plainPassword = "1234";
        $hashedPassword = $this->ph->hashPassword($user6,$plainPassword);
        $user6->setPassword($hashedPassword);
        $user6->setNom("Dupont");
        $user6->setPrenom("Léon");

        $manager->persist($user6);

        //CANDIDAT 1
        $candidat= new Candidat();
        $candidat->setNom('LEROY');
        $candidat->setPrenom('BERNARD');
        $candidat->setUser($user4);
        $candidat->setEvenement($evt);


        $manager->persist($candidat);


        //CANDIDAT 2
        $candidat2 =new Candidat();
        $candidat2->setNom('DUPONT');
        $candidat2->setPrenom('Aurel');

        $manager->persist($candidat2);


        //CANDIDAT 3
        $candidat3 =new Candidat();
        $candidat3->setNom('POULAIN');
        $candidat3->setPrenom('Amélie');
        $manager->persist($candidat3);


        //PARTENIAIRE
        $partenaire =new Partenaire();
        $partenaire->setOrganisme('Pole-emploi');
        $manager->persist($partenaire);

        $partenaire2 =new Partenaire();
        $partenaire2->setOrganisme('Mission Locale');
        $manager->persist($partenaire2);

        $partenaire3 =new Partenaire();
        $partenaire3->setOrganisme('Region');
        $manager->persist($partenaire3);

    

        $manager->flush();
    }
}
