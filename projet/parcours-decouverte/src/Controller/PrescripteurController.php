<?php

namespace App\Controller;

use App\Entity\Candidat;
use App\Entity\Evenement;
use App\Form\CandidatFormType;
use App\Repository\CandidatRepository;
use App\Repository\EvenementRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PrescripteurController extends AbstractController
{
    // /**
    //  * @Route("/prescripteur", name="prescripteur")
    //  */
    #[Route("/prescripteur", name: "prescripteur")]
    public function index(EvenementRepository $repo): Response
    {
        $this->denyAccessUnlessGranted('ROLE_PRESCRIPTEUR');
        $listeEvenement = $repo->findEvenementFuture();

        return $this->render('prescripteur/prescripteur.html.twig', [
            'controller_name' => 'PrescripteurController',
            'listeEvenement' => $listeEvenement,
        ]);
    }

    // /**
    //  * @Route("prescripteur/detail/{evenement}", name="prescripteur_detail")
    //  */
    #[Route("prescripteur/detail/{evenement}", name: "prescripteur_detail")]
    public function detail(EvenementRepository $repo, Evenement $evenement, CandidatRepository $cand): Response
    {
        $listeEvenement = $repo->findById($evenement->getId());
        $listeCandidat = $cand->findCandidatByEvent($evenement->getId(), $this->getUser()->getId());

        return $this->render('prescripteur/detail.html.twig', [
            'controller_name' => 'AcceuilController',
            'listeEvenement' => $listeEvenement,
            'listeCandidat' => $listeCandidat,
        ]);
    }


    // /**
    //  * @Route("/prescripteur/ajouter/{id}", name="prescripteur_ajouter")
    //  */
    #[Route("prescripteur/ajouter/{id}", name: "prescripteur_ajouter")]
    public function ajouterCandidat(Request $request, Evenement $id): Response
    {
        $this->denyAccessUnlessGranted('ROLE_PRESCRIPTEUR');

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
        return $this->render('prescripteur/prescripteurAjouter.html.twig', [
            'controller_name' => 'PrescripteurController',
            'form' => $form->createView(),
        ]);
    }

    // /**
    //  * @Route("/prescripteur/modifier/{id}", name="prescripteur_modifier")
    //  */
    #[Route("/prescripteur/modifier/{id}", name: "prescripteur_modifier")]
    public function modifierCandidat(Request $request, Candidat $can): Response
    {
        $this->denyAccessUnlessGranted('ROLE_PRESCRIPTEUR');

        $form = $this->createForm(CandidatFormType::class, $can);
        $form->handleRequest($request);
        $id = $can->getEvenement()->getId();

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('detail', ['evenement' => $id], Response::HTTP_SEE_OTHER);
        }

        return $this->render('prescripteur/prescripteurModifier.html.twig', [
            'evenement' => $can,
            'form' => $form->createView(),
        ]);
    }

    // /**
    //  * @Route("/prescripteur/supprimer/{id}", name="prescripteur_supprimer")
    //  */
    #[Route("/prescripteur/supprimer/{id}", name: "prescripteur_supprimer")]
    public function supprimerCandidat(Candidat $can): Response
    {
        $this->denyAccessUnlessGranted('ROLE_PRESCRIPTEUR');

        $id = $can->getEvenement()->getId();
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($can);
        $entityManager->flush();
        return $this->redirectToRoute('detail', ['evenement' => $id], Response::HTTP_SEE_OTHER);
    }
}
