<?php

namespace App\Controller;

use DateTime;
use Exception;
use App\Entity\User;
use App\Service\Tools;
use App\Entity\Candidat;
use App\Entity\Evenement;
use Doctrine\DBAL\Result;
use App\Entity\Partenaire;
use App\Form\RoleFormType;
use App\Form\CandidatFormType;
use App\Form\EvenementFormType;
use Doctrine\ORM\EntityManager;
use App\Form\PartenaireFormType;
use Symfony\Component\Mime\Email;
use App\Repository\UserRepository;
use App\Repository\CustomRepository;
use App\Form\RoleInscriptionFormType;
use App\Repository\CandidatRepository;
use App\Repository\EvenementRepository;
use App\Repository\PartenaireRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdministrateurController extends AbstractController
{
    // /**
    //  * @Route("/administrateur", name="administrateur")
    //  */
    // public function index(EvenementRepository $repo): Response
    // {
    //     $this->denyAccessUnlessGranted('ROLE_ADMIN');

    //     $user = $this->getUser()->getId();
    //     $listeEvenementFuture = $repo->findEvenementFuture();
    //     $listeEvenementPasse = $repo->findEvenementPasse();

    //     return $this->render('administrateur/administrateur.html.twig', [
    //         'controller_name' => 'adminstrateurController',
    //         'listeEvenementFuture' => $listeEvenementFuture,
    //         'listeEvenementPasse' => $listeEvenementPasse,
    //         'user' => $user,
    //     ]);
    // }


    // /**
    //  * @Route("/administrateur/detail/{evenement}", name="administrateur_detail")
    //  */
    // public function detail(EvenementRepository $repo, Evenement $evenement, CandidatRepository $cand): Response
    // {
    //     // test
    //     $this->denyAccessUnlessGranted('ROLE_ADMIN');

    //     $listeEvenement = $repo->findById($evenement->getId());
    //     $listeCandidat = $cand->findCandidatByAdmin($evenement->getId());

    //     return $this->render('administrateur/detail.html.twig', [
    //         'controller_name' => 'AcceuilController',
    //         'listeEvenement' => $listeEvenement,
    //         'listeCandidat' => $listeCandidat,
    //     ]);
    // }

    // /**
    //  * @Route("/administrateur/creer/evenement", name="administrateur_creer_evenement")
    //  */
    // public function creerEvenement(EntityManagerInterface $entityManager, Request $request): Response
    // {
    //     $this->denyAccessUnlessGranted('ROLE_ADMIN');

    //     $ev = new Evenement();
    //     $form = $this->createForm(EvenementFormType::class, $ev);
    //     $form->handleRequest($request);


    //     if ($form->isSubmitted() && $form->isValid()) {

    //         $ev->setUser($this->getUser());

    //         $entityManager = $this->getDoctrine()->getManager();
    //         $entityManager->persist($ev);
    //         $entityManager->flush();

    //         return $this->redirectToRoute('administrateur', [], Response::HTTP_SEE_OTHER);
    //     }

    //     return $this->render('administrateur/evenementAjouter.html.twig', [
    //         'controller_name' => 'OrganisateurController',
    //         'form' => $form->createView(),
    //     ]);
    // }

    // /**
    //  * @Route("/administrateur/modifier/evenement/{id}", name="administrateur_modifier_evenement")
    //  */
    // public function modifierEvenement(Request $request, Evenement $ev): Response
    // {
    //     $this->denyAccessUnlessGranted('ROLE_ADMIN');

    //     $form = $this->createForm(EvenementFormType::class, $ev);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $this->getDoctrine()->getManager()->flush();

    //         return $this->redirectToRoute('administrateur_detail', ['evenement' => $ev->getId()], Response::HTTP_SEE_OTHER);
    //     }

    //     return $this->render('administrateur/evenementModifier.html.twig', [
    //         'evenement' => $ev,
    //         'form' => $form->createView(),
    //     ]);
    // }

    // /**
    //  * @Route("/administrateur/supprimer/evenement/{id}", name="administrateur_supprimer_evenement")
    //  */
    // public function supprimerEvenement(EntityManagerInterface $entityManager, Evenement $ev): Response
    // {
    //     $this->denyAccessUnlessGranted('ROLE_ADMIN');

    //     $entityManager = $this->getDoctrine()->getManager();
    //     $entityManager->remove($ev);
    //     $entityManager->flush();
    //     return $this->redirectToRoute('administrateur', [], Response::HTTP_SEE_OTHER);
    // }


    // /**
    //  * @Route("/administrateur/ajouter/candidat/{id}", name="administrateur_ajouter_candidat")
    //  */

    #[Route("administrateur/ajouter/candidat/{id}", name: "administrateur_ajouter_candidat")]
    public function ajouterCandidat(EntityManagerInterface $entityManager, Request $request, Evenement $id): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $can = new Candidat();
        $form = $this->createForm(CandidatFormType::class, $can);
        $form->handleRequest($request);
        $event = $id->getId();

        if ($form->isSubmitted() && $form->isValid()) {

            $can->setUser($this->getUser());
            $can->setEvenement($id);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($can);
            $entityManager->flush();

            return $this->redirectToRoute('administrateur_detail', ['evenement' => $event], Response::HTTP_SEE_OTHER);
        }
        return $this->render('administrateur/candidatAjouter.html.twig', [
            'controller_name' => 'administrateurController',
            'form' => $form->createView(),
        ]);
    }

    // /**
    //  * @Route("/administrateur/modifier/candidat/{id}", name="administrateur_modifier_candidat")
    //  */
    #[Route("/administrateur/modifier/candidat/{id}", name: "administrateur_modifier_candidat")]
    public function modifierCandidat(Request $request, Candidat $can): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $form = $this->createForm(CandidatFormType::class, $can);
        $form->handleRequest($request);
        $id = $can->getEvenement()->getId();

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('administrateur_detail', ['evenement' => $id], Response::HTTP_SEE_OTHER);
        }

        return $this->render('administrateur/candidatModifier.html.twig', [
            'evenement' => $can,
            'form' => $form->createView(),
        ]);
    }

    // /**
    //  * @Route("/administrateur/supprimer/candidat/{id}", name="administrateur_supprimer_candidat")
    //  */
    #[Route("/administrateur/supprimer/candidat/{id}", name: "administrateur_supprimer_candidat")]
    public function supprimerCandidat(EntityManagerInterface $entityManager, Candidat $can): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $id = $can->getEvenement()->getId();
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($can);
        $entityManager->flush();
        return $this->redirectToRoute('administrateur_detail', ['evenement' => $id], Response::HTTP_SEE_OTHER);
    }

    #[Route("/utilisateurs", name: "utilisateurs_liste")]
    #[IsGranted("ROLE_ADMIN")]
    public function utilisateurs_liste(UserRepository $repo): Response
    {
        // $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $listeRole = $repo->findAllButAdmin();
        $listeRoleValidation = $repo->findBy(['status' => 0]);
        $nombreAvalider = count($listeRoleValidation);
        //dd($listeRole);
        return $this->render('administrateur/gestionRole.html.twig', [
            'listeRole' => $listeRole,
            'listeAValider' => $listeRoleValidation,
            'nombreAvalider' => $nombreAvalider
        ]);
    }

    // /**
    //  * @Route("/administrateur/valider/role/{user}", name="administrateur_valider_role")
    //  */
    #[Route("/administrateur/valider/role/{user}", name: "administrateur_valider_role")]
    public function validerRoleUtilisateur(EntityManagerInterface $entityManager, Request $request, User $user, MailerInterface $mailer, UserRepository $repo, Tools $tools): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $form = $this->createForm(RoleInscriptionFormType::class);
        $form->get('nom')->setData($user->getNom());
        $form->get('email')->setData($user->getEmail());
        $form->get('prenom')->setData($user->getPrenom());
        $form->get('organisme')->setData($user->getOrganisme());

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $role = $form->get('roles')->getData();

            $tok = $tools->generate_token($user->getId());
            //dd($tok);
            $partenaire = $form->get('partenaire')->getData();

            $user->setToken($tok);
            $user->setRoles([$role]);
            $user->setStatus(1);
            $user->setPartenaire($partenaire);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();


            $emailEnvoyerA = $user->getEmail();

            $userAdmin = $repo->findByRole('ROLE_ADMIN');
            $emailAdmin = $userAdmin[0]->getEmail();
            //dd($emailAdmin);
            $adresse = $tools->url('passwordRecovery', $tok);

            $tools->sendEmailInvitation($emailEnvoyerA, $adresse, $user);

            return $this->redirectToRoute('utilisateurs_liste', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('administrateur/validerRole.html.twig', [
            'controller_name' => 'adminstrateurController',
            'form' => $form->createView(),
        ]);
    }

    // /**
    //  * @Route("/administrateur/send/invitation/{user}", name="administrateur_send_invitation")
    //  */
    #[Route("/administrateur/send/invitation/{user}", name: "administrateur_send_invitation")]
    public function administrateur_send_invitation(EntityManagerInterface $em, User $user, UserRepository $repo, Tools $tools): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $tok = $tools->generate_token($user->getId());


        $user->setToken($tok);
        $em->flush();


        $emailEnvoyerA = $user->getEmail();

        $userAdmin = $repo->findByRole('ROLE_ADMIN');
        $emailAdmin = $userAdmin[0]->getEmail();
            //dd($emailAdmin);
        $adresse = $tools->url('passwordRecovery', $tok);

        $tools->sendEmailInvitation($emailEnvoyerA, $adresse, $user);

        return $this->redirectToRoute('utilisateurs_liste', [], Response::HTTP_SEE_OTHER);
    }


    // /**
    //  * @Route("/administrateur/modifier/role/{id}", name="administrateur_modifier_role")
    //  */
    #[Route("/administrateur/modifier/role/{id}", name: "administrateur_modifier_role")]
    public function modifierRoleUtilisateur(Request $request, User $id): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $form = $this->createForm(RoleInscriptionFormType::class);
        $form->get('nom')->setData($id->getNom());
        $form->get('email')->setData($id->getEmail());
        $form->get('prenom')->setData($id->getPrenom());
        $form->get('organisme')->setData($id->getOrganisme());
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            
            $role = $form->get('roles')->getData();
            $nom = $form->get('nom')->getData();
            $prenom = $form->get('prenom')->getData();
            $partenaire = $form->get('partenaire')->getData();

            $id->setRoles([$role]);
            $id->setNom($nom);
            $id->setPrenom ($prenom);
            $id->setPartenaire($partenaire);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($id);
            $entityManager->flush();

            return $this->redirectToRoute('utilisateurs_liste', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('administrateur/validerRole.html.twig', [
            'controller_name' => 'adminstrateurController',
            'form' => $form->createView(),
        ]);
    }

    // /**
    //  * @Route("/administrateur/liste/partenaire/", name="administrateur_liste_partenaire")
    //  */
    #[Route("/administrateur/liste/partenaire/", name: "administrateur_liste_partenaire")]
    public function listePartenaire(PartenaireRepository $partenaire): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $partenaire = $partenaire->findAll();

        return $this->render('administrateur/partenaireListe.html.twig', [
            'controller_name' => 'administrateurController',
            'listePartenaire' => $partenaire,
        ]);
    }

    // /**
    //  * @Route("/administrateur/ajouter/partenaire/", name="administrateur_ajouter_partenaire")
    //  */

    #[Route("/administrateur/ajouter/partenaire/", name: "administrateur_ajouter_partenaire")]
    public function ajouterPartenaire(EntityManagerInterface $entityManager, Request $request): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $partenaire = new Partenaire;
        $form = $this->createForm(PartenaireFormType::class, $partenaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($partenaire);
            $entityManager->flush();

            return $this->redirectToRoute('administrateur', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render('administrateur/partenaireAjouter.html.twig', [
            'controller_name' => 'administrateurController',
            'form' => $form->createView(),
        ]);
    }

    // /**
    //  * @Route("/administrateur/modifier/partenaire/{id}", name="administrateur_modifier_partenaire")
    //  */
    #[Route("/administrateur/modifier/partenaire/{id}", name: "administrateur_modifier_partenaire")]
    public function modifierPartenaire(EntityManagerInterface $entityManager, Request $request, Partenaire $partenaire): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $form = $this->createForm(PartenaireFormType::class, $partenaire);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($partenaire);
            $entityManager->flush();

            return $this->redirectToRoute('administrateur', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render('administrateur/partenaireModifier.html.twig', [
            'controller_name' => 'administrateurController',
            'form' => $form->createView(),
        ]);
    }

    // /**
    //  * @Route("/administrateur/supprimer/partenaire/{id}", name="administrateur_supprimer_partenaire")
    //  */
    // public function supprimerPartenaire(Partenaire $partenaire): Response
    // {
    //     $this->denyAccessUnlessGranted('ROLE_ADMIN');

    //     $entityManager = $this->getDoctrine()->getManager();
    //     $entityManager->remove($partenaire);
    //     $entityManager->flush();
    //     return $this->redirectToRoute('administrateur', [], Response::HTTP_SEE_OTHER);
    // }


    /**
     * @Route("/administrateur/graphiques/", name="administrateur_graphiques")
     */
    public function afficherGraphiques(
        Request $request,
        EntityManagerInterface $em,
        Tools $tools,
        CustomRepository $repo,
        $erreur = 0
    ): Response {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        //*****************************************************************************************************************
        //requete en 3 étape pour récurer les données à envoyer pour faire le graph des orga les plus actif de l'année passée
        //*****************************************************************************************************************

        try {
            //**********************************************
            //on récupère les 3 requetes pour orga/prescri
            //**********************************************
            $rawQuery1 = $repo->findNombreOrga();
            $rawQuery2 = $repo->findListeOrga();
            $rawQuery3 = $repo->findQuantityOrga();
            //-------------------------------------
            $rawQuery4 = $repo->findNombreCandidat();
            $rawQuery5 = $repo->findListeCandidat();
            $rawQuery6 = $repo->findQuantityCandidat();

            //****************************************************
            //première requete pour récupérer jusqu'a 5 organisme
            //****************************************************
            $statement1 = $em->getConnection()->prepare($rawQuery1);
            $result1 = $statement1->executeQuery();
            $queryResult1 = $result1->fetchAllAssociative();
            //dd($queryResult1);
            //--------------------------------------------------------
            $statement4 = $em->getConnection()->prepare($rawQuery4);
            $result4 = $statement4->executeQuery();
            $queryResult4 = $result4->fetchAllAssociative();

            //******************************************************************************************
            //on récupère les differents orga/prescri avec des conditions au cas ou y'en a moins de 5
            //******************************************************************************************
            $data1 = (isset($queryResult1[0]["organisme"])) ? $queryResult1[0]["organisme"] : "dataTest1";
            $data2 = (isset($queryResult1[1]["organisme"])) ? $queryResult1[1]["organisme"] : "dataTest2";
            $data3 = (isset($queryResult1[2]["organisme"])) ? $queryResult1[2]["organisme"] : "dataTest3";
            $data4 = (isset($queryResult1[3]["organisme"])) ? $queryResult1[3]["organisme"] : "dataTest4";
            $data5 = (isset($queryResult1[4]["organisme"])) ? $queryResult1[4]["organisme"] : "dataTest5";
            //-------------------------------------------------------------------------------------------------
            $data6 = (isset($queryResult4[0]["organisme"])) ? $queryResult4[0]["organisme"] : "dataTest6";
            $data7 = (isset($queryResult4[1]["organisme"])) ? $queryResult4[1]["organisme"] : "dataTest7";
            $data8 = (isset($queryResult4[2]["organisme"])) ? $queryResult4[2]["organisme"] : "dataTest8";
            $data9 = (isset($queryResult4[3]["organisme"])) ? $queryResult4[3]["organisme"] : "dataTest9";
            $data10 = (isset($queryResult4[4]["organisme"])) ? $queryResult4[4]["organisme"] : "dataTest10";
            //dd($data10);

            //*************************************************************************
            //2eme requete pour récupérer la liste des orga/prescri et nombre d'event
            //*************************************************************************
            $statement2 = $em->getConnection()->prepare($rawQuery2);
            $statement2->bindValue("org1", $data1);
            $statement2->bindValue("org2", $data2);
            $statement2->bindValue("org3", $data3);
            $statement2->bindValue("org4", $data4);
            $statement2->bindValue("org5", $data5);
            $result2 = $statement2->executeQuery();
            $queryResult2 = $result2->fetchAllAssociative();
            //dd($queryResult2);
            //---------------------------------------------------------------
            $statement5 = $em->getConnection()->prepare($rawQuery5);
            $statement5->bindValue("pre1", $data6);
            $statement5->bindValue("pre2", $data7);
            $statement5->bindValue("pre3", $data8);
            $statement5->bindValue("pre4", $data9);
            $statement5->bindValue("pre5", $data10);
            $result5 = $statement5->executeQuery();
            $queryResult5 = $result5->fetchAllAssociative();
            //dd($queryResult5);

            //*****************************************************************
            //3eme requete pour savoir combien d'orga/prescri ont des données
            //*****************************************************************
            $statement3 = $em->getConnection()->prepare($rawQuery3);
            $result3 = $statement3->executeQuery();
            $queryResult3 = $result3->fetchAllAssociative();
            //dd($queryResult3);
            $resultat1 = $queryResult3[0]['quantite'];
            //dd($resultat1);
            //------------------------------------------------------------
            $statement6 = $em->getConnection()->prepare($rawQuery6);
            $result6 = $statement6->executeQuery();
            $queryResult6 = $result6->fetchAllAssociative();
            //dd($queryResult3);
            $resultat2 = $queryResult6[0]['quantite'];


            //******************************************************************************
            //switch pour convertir le bon nombre de table selon le nombre d'orga récuperer
            //******************************************************************************
            switch ($resultat1) {
                case 0:
                    $tableNombre1[] = [];
                    $tableNombre2[] = [];
                    $tableNombre3[] = [];
                    $tableNombre4[] = [];
                    $tableNombre5[] = [];
                    $tableMois[] = [];
                case 1:
                    $table1 = $tools->tableSplit($queryResult2, $data1);
                    $tableNombre1 = $tools->encodeEtRemplirTableMois($table1, true);
                    $tableMois = $tools->encodeEtRemplirTableMois($table1, false);
                    $tableNombre2[] = [];
                    $tableNombre3[] = [];
                    $tableNombre4[] = [];
                    $tableNombre5[] = [];

                case 2:
                    $table1 = $tools->tableSplit($queryResult2, $data1);
                    $table2 = $tools->tableSplit($queryResult2, $data2);
                    $tableNombre1 = $tools->encodeEtRemplirTableMois($table1, true);
                    $tableMois = $tools->encodeEtRemplirTableMois($table1, false);
                    $tableNombre2 = $tools->encodeEtRemplirTableMois($table2, true);
                    $tableNombre3[] = [];
                    $tableNombre4[] = [];
                    $tableNombre5[] = [];

                case 3:
                    $table1 = $tools->tableSplit($queryResult2, $data1);
                    $table2 = $tools->tableSplit($queryResult2, $data2);
                    $table3 = $tools->tableSplit($queryResult2, $data3);
                    $tableNombre1 = $tools->encodeEtRemplirTableMois($table1, true);
                    $tableMois = $tools->encodeEtRemplirTableMois($table1, false);
                    $tableNombre2 = $tools->encodeEtRemplirTableMois($table2, true);
                    $tableNombre3 = $tools->encodeEtRemplirTableMois($table3, true);
                    $tableNombre4[] = [];
                    $tableNombre5[] = [];

                case 4:
                    $table1 = $tools->tableSplit($queryResult2, $data1);
                    $table2 = $tools->tableSplit($queryResult2, $data2);
                    $table3 = $tools->tableSplit($queryResult2, $data3);
                    $table4 = $tools->tableSplit($queryResult2, $data4);
                    $tableNombre1 = $tools->encodeEtRemplirTableMois($table1, true);
                    $tableMois = $tools->encodeEtRemplirTableMois($table1, false);
                    $tableNombre2 = $tools->encodeEtRemplirTableMois($table2, true);
                    $tableNombre3 = $tools->encodeEtRemplirTableMois($table3, true);
                    $tableNombre4 = $tools->encodeEtRemplirTableMois($table4, true);
                    $tableNombre5[] = [];

                default:
                    $table1 = $tools->tableSplit($queryResult2, $data1);
                    $table2 = $tools->tableSplit($queryResult2, $data2);
                    $table3 = $tools->tableSplit($queryResult2, $data3);
                    $table4 = $tools->tableSplit($queryResult2, $data4);
                    $table5 = $tools->tableSplit($queryResult2, $data5);
                    //dd($table2);
                    $tableNombre1 = $tools->encodeEtRemplirTableMois($table1, true);
                    $tableMois = $tools->encodeEtRemplirTableMois($table1, false);
                    $tableNombre2 = $tools->encodeEtRemplirTableMois($table2, true);
                    $tableNombre3 = $tools->encodeEtRemplirTableMois($table3, true);
                    $tableNombre4 = $tools->encodeEtRemplirTableMois($table4, true);
                    $tableNombre5 = $tools->encodeEtRemplirTableMois($table5, true);
            }

            //*******************************************************************************************
            //switch pour convertir le bon nombre de table selon le nombre de prescripteur récuperer
            //*******************************************************************************************
            switch ($resultat2) {
                case 0:
                    $tableNombre6[] = [];
                    $tableNombre7[] = [];
                    $tableNombre8[] = [];
                    $tableNombre9[] = [];
                    $tableNombre10[] = [];
                    $tableMois1[] = [];
                case 1:
                    $table6 = $tools->tableSplit($queryResult5, $data6);
                    $tableNombre6 = $tools->encodeEtRemplirTableMois($table6, true);
                    $tableMois1 = $tools->encodeEtRemplirTableMois($table6, false);
                    $tableNombre7[] = [];
                    $tableNombre8[] = [];
                    $tableNombre9[] = [];
                    $tableNombre10[] = [];

                case 2:
                    $table6 = $tools->tableSplit($queryResult5, $data6);
                    $table7 = $tools->tableSplit($queryResult5, $data7);
                    $tableNombre6 = $tools->encodeEtRemplirTableMois($table6, true);
                    $tableMois1 = $tools->encodeEtRemplirTableMois($table6, false);
                    $tableNombre7 = $tools->encodeEtRemplirTableMois($table7, true);
                    $tableNombre8[] = [];
                    $tableNombre9[] = [];
                    $tableNombre10[] = [];

                case 3:
                    $table6 = $tools->tableSplit($queryResult5, $data6);
                    $table7 = $tools->tableSplit($queryResult5, $data7);
                    $table8 = $tools->tableSplit($queryResult5, $data8);
                    $tableNombre6 = $tools->encodeEtRemplirTableMois($table6, true);
                    $tableMois1 = $tools->encodeEtRemplirTableMois($table6, false);
                    $tableNombre7 = $tools->encodeEtRemplirTableMois($table7, true);
                    $tableNombre8 = $tools->encodeEtRemplirTableMois($table8, true);
                    $tableNombre9[] = [];
                    $tableNombre10[] = [];

                case 4:
                    $table6 = $tools->tableSplit($queryResult5, $data6);
                    $table7 = $tools->tableSplit($queryResult5, $data7);
                    $table8 = $tools->tableSplit($queryResult5, $data8);
                    $table9 = $tools->tableSplit($queryResult5, $data9);
                    $tableNombre6 = $tools->encodeEtRemplirTableMois($table6, true);
                    $tableMois1 = $tools->encodeEtRemplirTableMois($table6, false);
                    $tableNombre7 = $tools->encodeEtRemplirTableMois($table7, true);
                    $tableNombre8 = $tools->encodeEtRemplirTableMois($table8, true);
                    $tableNombre9 = $tools->encodeEtRemplirTableMois($table9, true);
                    $tableNombre10[] = [];

                default:
                    $table6 = $tools->tableSplit($queryResult5, $data6);
                    $table7 = $tools->tableSplit($queryResult5, $data7);
                    $table8 = $tools->tableSplit($queryResult5, $data8);
                    $table9 = $tools->tableSplit($queryResult5, $data9);
                    $table10 = $tools->tableSplit($queryResult5, $data10);
                    //dd($table2);
                    $tableNombre6 = $tools->encodeEtRemplirTableMois($table6, true);
                    $tableMois1 = $tools->encodeEtRemplirTableMois($table6, false);
                    $tableNombre7 = $tools->encodeEtRemplirTableMois($table7, true);
                    $tableNombre8 = $tools->encodeEtRemplirTableMois($table8, true);
                    $tableNombre9 = $tools->encodeEtRemplirTableMois($table9, true);
                    $tableNombre10 = $tools->encodeEtRemplirTableMois($table10, true);
            }
            //dd($tableNombre1);
        } catch (Exception $e) {
            $erreur = $e->getMessage();
        }

        return $this->render('administrateur/AllGraphiques.html.twig', [
            'tableOrga1' => $data1,
            'tableNombreOrga1' => $tableNombre1,
            'tableOrga2' => $data2,
            'tableNombreOrga2' => $tableNombre2,
            'tableOrga3' => $data3,
            'tableNombreOrga3' => $tableNombre3,
            'tableOrga4' => $data4,
            'tableNombreOrga4' => $tableNombre4,
            'tableOrga5' => $data5,
            'tableNombreOrga5' => $tableNombre5,
            'tableMoisOrg' => $tableMois,
            'tableMoisPres' => $tableMois1,
            'tablePre1' => $data6,
            'tableNombrePre1' => $tableNombre6,
            'tablePre2' => $data7,
            'tableNombrePre2' => $tableNombre7,
            'tablePre3' => $data8,
            'tableNombrePre3' => $tableNombre8,
            'tablePre4' => $data9,
            'tableNombrePre4' => $tableNombre9,
            'tablePre5' => $data10,
            'tableNombrePre5' => $tableNombre10,
            'erreur' => $erreur,
        ]);
    }

    // /**
    //  * @Route("/administrateur/graphique/candidat", name="administrateur_graphique_candidat")
    //  */
    // public function afficherGraphiqueCandidat(Request $request, EntityManagerInterface $em, Tools $tools, $erreur = 0, CustomRepository $repo): Response
    // {
    //     $this->denyAccessUnlessGranted('ROLE_ADMIN');

    //     //*****************************************************************************************************************
    //     //requete en 3 étape pour récurer les données à envoyer pour faire le graph des prescri les plus actif de l'année passée
    //     //*****************************************************************************************************************

    //     try {
    //         $rawQuery1 = $repo->findNombreCandidat();
    //         $rawQuery2 = $repo->findListeCandidat();

    //         $statement1 = $em->getConnection()->prepare($rawQuery1);
    //         $result1 = $statement1->executeQuery();
    //         $queryResult1 = $result1->fetchAllAssociative();
    //         //dd($queryResult1);

    //         $statement2 = $em->getConnection()->prepare($rawQuery2);
    //         $statement2->bindValue("pre1", $queryResult1[0]["organisme"]);
    //         $statement2->bindValue("pre2", $queryResult1[1]["organisme"]);
    //         $statement2->bindValue("pre3", $queryResult1[2]["organisme"]);
    //         $statement2->bindValue("pre4", $queryResult1[3]["organisme"]);
    //         $statement2->bindValue("pre5", $queryResult1[4]["organisme"]);
    //         $result2 = $statement2->executeQuery();

    //         $queryResult2 = $result2->fetchAllAssociative();
    //         //dd($queryResult2);


    //         $table1 = $tools->tableSplit($queryResult2, $queryResult1[0]["organisme"]);
    //         $table2 = $tools->tableSplit($queryResult2, $queryResult1[1]["organisme"]);
    //         $table3 = $tools->tableSplit($queryResult2, $queryResult1[2]["organisme"]);
    //         $table4 = $tools->tableSplit($queryResult2, $queryResult1[3]["organisme"]);
    //         $table5 = $tools->tableSplit($queryResult2, $queryResult1[4]["organisme"]);
    //         //dd($table2);

    //         $tableNombre1 = $tools->encodeEtRemplirTableMois($table1, true);
    //         $tableNombre2 = $tools->encodeEtRemplirTableMois($table2, true);
    //         $tableNombre3 = $tools->encodeEtRemplirTableMois($table3, true);
    //         $tableNombre4 = $tools->encodeEtRemplirTableMois($table4, true);
    //         $tableNombre5 = $tools->encodeEtRemplirTableMois($table5, true);
    //         //dd($tableNombre5);

    //     } catch (Exception $e) {
    //         $erreur = $e->getMessage();
    //     }

    //     return $this->render('administrateur/afficherGraphiqueCandidat.html.twig', [
    //         'controller_name' => 'administrateurController',
    //         'tableOrga1' => $queryResult1[0]["organisme"],
    //         'tableNombre1' => $tableNombre1,
    //         'tableOrga2' => $queryResult1[1]["organisme"],
    //         'tableNombre2' => $tableNombre2,
    //         'tableOrga3' => $queryResult1[2]["organisme"],
    //         'tableNombre3' => $tableNombre3,
    //         'tableOrga4' => $queryResult1[3]["organisme"],
    //         'tableNombre4' => $tableNombre4,
    //         'tableOrga5' => $queryResult1[4]["organisme"],
    //         'tableNombre5' => $tableNombre5,
    //         'erreur' => $erreur,
    //     ]);
    // }

    /**
     * @Route("/administrateur/test", name="administrateur_test")
     */
    public function test(Tools $tools): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $table[] = ["mois" => "04", "nombre" => 1];
        $table[] = ["mois" => "05", "nombre" => 2];
        $table[] = ["mois" => "07", "nombre" => 3];
        $table[] = ["mois" => "08", "nombre" => 4];
        $table[] = ["mois" => "10", "nombre" => 5];
        $table[] = ["mois" => "11", "nombre" => 6];
        $table[] = ["mois" => "12", "nombre" => 7];
        $table[] = ["mois" => "02", "nombre" => 8];
        $table[] = ["mois" => "03", "nombre" => 9];

        //dd($table);

        $tableNombre1 = $tools->encodeEtRemplirTableMois($table, true);
        //dd($tableNombre1);

        return $this->render('administrateur/test.html.twig', [
            'controller_name' => 'adminstrateurController',
        ]);
    }
}
