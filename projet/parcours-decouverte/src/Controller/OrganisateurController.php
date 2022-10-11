<?php

namespace App\Controller;

use App\Entity\Candidat;
use App\Entity\Evenement;
use App\Form\CandidatFormType;
use App\Form\EvenementFormType;
use App\Repository\CandidatRepository;
use App\Repository\EvenementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class OrganisateurController extends AbstractController
{
    // /**
    //  * @Route("/organisateur", name="organisateur")
    //  */
    // #[Route("/organisateur", name: "organisateur")]
    // public function index(EvenementRepository $repo): Response
    // {
    //     $this->denyAccessUnlessGranted('ROLE_ORGANISATEUR');
    //     $user = $this->getUser();
    //     $evenements=$repo->findByUser($user);
    //     $listeEvenementFuture = $repo->findEvenementOrganisateurFuture($this->getUser()->getId());
    //     $listeEvenementPasse = $repo->findEvenementOrganisateurPasse($this->getUser()->getId());
    //     $user = $this->getUser()->getId();

    //     return $this->render('accueil/accueil.html.twig', [
    //         'evenements' => $evenements,
    //         'controller_name' => 'OrganisateurController',
    //         'listeEvenementFuture' => $listeEvenementFuture,
    //         'listeEvenementPasse' => $listeEvenementPasse,
    //         'user' => $user,
    //     ]);
    // }

    // /**
    //  * @Route("/organisateur/detail/{evenement}", name="organisateur_detail")
    //  */
    #[Route("/organisateur/detail/{evenement}", name: "organisateur_detail")]
    public function detail(EvenementRepository $repo, Evenement $evenement, CandidatRepository $cand): Response
    {
        
        $listeCandidat = $cand->findCandidatByEventOrga($evenement->getId(), $this->getUser()->getId());

        return $this->render('accueil/detail.html.twig', [
            'controller_name' => 'AcceuilController',
            'evenement' => $evenement,
            'listeCandidat' => $listeCandidat,
        ]);
    }

    // /**
    //  * @Route("/organisateur/creer", name="organisateur_creer")
    //  */
    #[Route("/organisateur/creer", name: "organisateur_creer")]
    public function creerEvenement(Request $request): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ORGANISATEUR');

        $ev = new Evenement();
        $form = $this->createForm(EvenementFormType::class, $ev);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $ev->setUser($this->getUser());

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ev);
            $entityManager->flush();

            return $this->redirectToRoute('accueil', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('organisateur/evenementAjouter.html.twig', [
            'controller_name' => 'OrganisateurController',
            'form' => $form->createView(),
        ]);
    }

    // /**
    //  * @Route("/organisateur/modifier/{id}", name="organisateur_modifier")
    //  */
    #[Route("/organisateur/modifier/{id}", name: "organisateur_modifier")]
    public function modifierEvenement(Request $request, Evenement $ev): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ORGANISATEUR');

        $form = $this->createForm(EvenementFormType::class, $ev);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('organisateur_detail', ['evenement' => $ev->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->render('organisateur/evenementModifier.html.twig', [
            'evenement' => $ev,
            'form' => $form->createView(),
        ]);
    }

    // /**
    //  * @Route("/organisateur/supprimer/{id}", name="organisateur_supprimer")
    //  */
    #[Route("/organisateur/supprimer/{id}", name: "organisateur_supprimer")]
    public function supprimerEvenement(Evenement $ev): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ORGANISATEUR');

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($ev);
        $entityManager->flush();
        return $this->redirectToRoute('organisateur', [], Response::HTTP_SEE_OTHER);
    }



    // /**
    //  * @Route("/organisateur/candidat/ajouter/{id}", name="organisateur_candidat_ajouter")
    //  */
    #[Route("/organisateur/candidat/ajouter/{id}", name: "organisateur_candidat_ajouter")]
    public function ajouterCandidat(Request $request, Evenement $id): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ORGANISATEUR');

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

            return $this->redirectToRoute('detail', ['evenement' => $event], Response::HTTP_SEE_OTHER);
        }
        return $this->render('organisateur/candidatAjouter.html.twig', [
            'controller_name' => 'PrescripteurController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/presence", name="presence")
     */
    #[Route("/organisateur/presence/{id}", name: "organisateur_presence")]

    public function present($id, Request $request, CandidatRepository $repo, EntityManagerInterface $em): Response
    {
        if ($request->isXMLHttpRequest()) {
            $candidat = $repo->find($id);
            $candidat->setPresent(!$candidat->getPresent());
            $em->flush();
        }  

        return $this->json([
            "present" => $candidat->getPresent()
        ]);
    }

    /**
     * @Route("/suite", name="suite")
     */
    #[Route("/organisateur/suite/{id}", name: "organisateur_suite")]

    public function suite($id, Request $request, CandidatRepository $repo, EntityManagerInterface $em): Response
    {
        if ($request->isXMLHttpRequest()) {
            $candidat = $repo->find($id);
            $candidat->setSuite(!$candidat->getSuite());
            $em->flush();
        }  

        return $this->json([
            "suite" => $candidat->getSuite()
        ]);
    }

}
