<?php

namespace App\Controller;

use DateTime;
use DateInterval;
use App\Entity\User;
use App\Form\UserType;
use App\Service\Tools;
use App\Entity\Candidat;
use App\Entity\Evenement;
use App\Entity\Partenaire;
use App\Form\CandidatFormType;
use App\Form\EvenementFormType;
use Doctrine\ORM\EntityManager;
use App\Form\InscriptionFormType;
use Symfony\Component\Mime\Email;
use App\Repository\UserRepository;
use App\Form\ValidateEmailFormType;
use Symfony\Component\Mailer\Mailer;
use App\Form\PasswordRecoveryFormType;
use App\Repository\CandidatRepository;
use App\Repository\EvenementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class AccueilController extends AbstractController
{
    // /**
    //  * @Route("/", name="accueil")
    //  */
    #[Route("/", name: "accueil")]
    public function accueil(EvenementRepository $repo): Response
    {
        $evenements = $repo->findEvenementFuture();
        $user = $this->getUser();
        $evenements_passes = $repo->findEvenementPasse($user);

        return $this->render('accueil/accueil.html.twig', [
            'evenements' => $evenements,
            'evenements_passes' => $evenements_passes,
        ]);
    }

    // ROUTE SEULEMENT POUR ORGANISATEUR
    // /**
    //  * @Route("/mes_evenements/", name="mes_evenements")
    //  */
    #[Route("/mes_evenements", name: "mes_evenements")]
    public function mes_evenements(EvenementRepository $repo): Response
    {
        // $iduser=$user->find($this->getUser())->getId();
        $user = $this->getUser();
        $evenements=$repo->findEvenementOrganisateurFuture($user);
        $evenements_passes = $repo->findEvenementPasse($user);


        return $this->render('accueil/accueil.html.twig', [
            'evenements' => $evenements,
            'evenements_passes' => $evenements_passes,
            
        ]);
    }

    // /**
    // * @Route("/detail/{evenement}", name="detail")
    // */
    #[Route("/detail/{evenement}", name: "detail")]
    public function detail(Evenement $evenement, CandidatRepository $cand) : Response
    {
        // ADMIN
        // $listeEvenement = $repo->findById($evenement->getId());
        $listeCandidat = $cand->findCandidatByAdmin($evenement->getId());
    
        return $this->render('accueil/detail.html.twig', [
            'controller_name' => 'AcceuilController',
            'evenement' => $evenement,
            // 'listeEvenement' => $listeEvenement,
            'listeCandidat' => $listeCandidat,
        ]);
    }

   // /**
    // * @Route("/listeCandidat/{evenement}", name="listeCandidat")
    // */
    #[Route("/listeCandidat/{evenement}", name: "listeCandidat")]
    public function listeCandidat(Evenement $evenement, CandidatRepository $cand) : Response
    {
        // ADMIN
        // $listeEvenement = $repo->findById($evenement->getId());
        $user = $this->getUser();
        $listeCandidat = $cand->findCandidatByAdmin($evenement->getId());
        // dump($listeCandidat);
        return $this->render('accueil/listeCandidats.html.twig', [
            'controller_name' => 'AcceuilController',
            'evenement' => $evenement,
            // 'listeEvenement' => $listeEvenement,
            'listeCandidat' => $listeCandidat,
            'user'=>$user,
        ]);
    }

    // /**
    //   * @Route("/detail/modifier/evenement/{id}", name="detail_modifier_evenement")
    //   */
    #[Route("/detail/modifier/evenement/{id}", name: "detail_modifier_evenement")]
    public function modifierEvenement(Request $request, Evenement $ev): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ORGANISATEUR');

        $form = $this->createForm(EvenementFormType::class, $ev);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('administrateur_detail', ['evenement' => $ev->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->render('organisateur/evenementModifier.html.twig', [
            'evenement' => $ev,
            'form' => $form->createView(),
        ]);
    }

// /**
//       * @Route("/detail/supprimer/evenement/{id}", name="detail_supprimer_evenement")
//       */
    #[Route("/detail/supprimer/evenement/{id}", name: "detail_supprimer_evenement")]
    public function supprimerEvenement(EntityManagerInterface $entityManager, Evenement $ev): Response
    {
        // $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($ev);
        $entityManager->flush();
        return $this->redirectToRoute('accueil', [], Response::HTTP_SEE_OTHER);
    }

    /**
     * @Route("/candidat/modifier/{id}", name="candidat_modifier")
     */

    #[Route("/candidat/modifier/{id}", name: "candidat_modifier")]
    public function modifierCandidat(Request $request, Candidat $can): Response
    {
    
    $form = $this->createForm(CandidatFormType::class, $can);
    $form->handleRequest($request);
    $id = $can->getEvenement()->getId();

    if ($form->isSubmitted() && $form->isValid()) {
        $this->getDoctrine()->getManager()->flush();
    
        return $this->redirectToRoute('organisateur_detail', ['evenement' => $id], Response::HTTP_SEE_OTHER);
    }
    
    return $this->render('accueil/candidatModifier.html.twig', [
        'evenement' => $can,
        'form' => $form->createView(),
    ]);
    }


    // /**
    //  * @Route("/candidat/supprimer/{id}", name="candidat_supprimer")
    //  */
    #[Route("/candidat/supprimer/{id}", name: "candidat_supprimer")]
    public function supprimerCandidat(Candidat $can): Response
    {

        $id = $can->getEvenement()->getId();
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($can);
        $entityManager->flush();
        return $this->redirectToRoute('organisateur_detail', ['evenement' => $id], Response::HTTP_SEE_OTHER);
    }



























    // /**
    //  * @Route("/inscription", name="inscription")
    //  */
    #[Route("/inscription", name: "inscription")]
    public function inscription(Request $request, MailerInterface $mailer, UserRepository $repo, Tools $tools): Response
    {
        $u = new User();
        //$p = new Partenaire(1);
        $form = $this->createForm(InscriptionFormType::class, $u);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $u->setRoles(["provisoire"]);
            $u->setPassword("provisoire");
            $u->setStatus(0);
            //$u->setPartenaire($p);

            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($u);
            //$entityManager->persist($p);
            $entityManager->flush();

            $userAdmin = $repo->findByRole('ROLE_ADMIN');
            $emailAdmin = $userAdmin[0]->getEmail();

            $adresse = $tools->url('utilisateurs_liste', '');

            //dd($emailAdmin);
            $email = (new TemplatedEmail())
                ->from('nepasrepondre@parcours-decouverte.app')
                ->to($emailAdmin)
                ->subject('nouvelle inscription')

                ->htmlTemplate('emails/inscription.html.twig')
                //->html('<p>Voir les nouvelles inscriptions <a href="https://127.0.0.1:8000/administrateur/gestionRole">ici</a>: </p>');
                // pass variables (name => value) to the template
                ->context([
                    'expiration_date' => new \DateTime('+7 days'),
                    'lien' => $adresse,
                ]);
            $mailer->send($email);

            $this->addFlash('success', '
                Nous avons bien pris en compte votre demande.
                Vous receverez très bientôt un email vous indiquant la marche à suivre..
            ');

            return $this->redirectToRoute('accueil', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('accueil/inscription.html.twig', [
            'controller_name' => 'AcceuilController',
            'form' => $form->createView(),
        ]);
    }


    // /**
    //  * @Route("/valideEmail", name="valideEmail")
    //  */
    #[Route("/valideEmail", name: "valideEmail")]

    public function valideEmail(Request $request, UserRepository $repo, Tools $tools, MailerInterface $mailer, EntityManagerInterface $entityManager): Response
    {
        $user = new User;
        $form = $this->createForm(ValidateEmailFormType::class, $user);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            //récupération de l'email du formulaire
            $email = $form->get('email')->getData();

            //requete pour vérifier si le mail existe dans la db
            $emailrepo = $repo->findOneBy(['email' => $email]);
            //dd($emailrepo);

            //si le mail est non null, on continue (il existe dans la db), ET le password != 'provisoire'
            if (($emailrepo != null) & ($emailrepo->getPassword() != 'provisoire')) {
                //dd($emailrepo);
                // creer un token avec l'id
                $tok = $tools->generate_token($emailrepo->getId());
                //enregistre le token en database
                $emailrepo->setToken($tok);
                $entityManager->persist($emailrepo);
                $entityManager->flush();

                //générer un lien avec le token
                $adresse = $tools->url('passwordRecovery', $tok);

                //envoyer un mail avec le lien vers le controller de récupération de mot de passe
                $email = (new TemplatedEmail())
                    ->from('nepasrepondre@parcours-decouverte.app')
                    ->to($email)
                    ->subject('changement de mot de passe')

                    ->htmlTemplate('emails/changementPassword.html.twig')

                    // pass variables (name => value) to the template
                    ->context([
                        'expiration_date' => new \DateTime('+7 days'),
                        'lien' => $adresse,
                    ]);

                $mailer->send($email);
            }
            return $this->redirectToRoute('accueil', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render('accueil/valideEmail.html.twig', [
            'controller_name' => 'AcceuilController',
            'form' => $form->createView(),
        ]);
    }


    // /**
    //  * @Route("/passwordRecovery/{token}", name="passwordRecovery")
    //  */
    #[Route("/passwordRecovery/{token}", name: "passwordRecovery")]
    public function passwordRecovery(Request $request, UserPasswordHasherInterface $passwordhasher, $token, Tools $tools, UserRepository $repo, EntityManagerInterface $entityManager, MailerInterface $mailer): Response
    {
        //récupération des donné du token
        $tok = $tools->decode_token($token);
        $id = $tok['user'];
        $date = $tok['date'];
        $date = $date['date'];
        //new objet datetime avec la string date recu dans le token + ajout de 7 day pour la date de péremption du token
        $date = new DateTime($date);
        $date->modify('+7 day');
        //dd($date);
        $date2 = (array)date_diff(new DateTime(), $date);
        //dd($date2);
        //récupération de l'entity en fonction de l'id reçu
        $user = $repo->find($id);
        //email de l'utilisateur
        $emailEnvoyerA = $user->getEmail();


        if ($user->getToken() == $token) { //condition pour check si le token reçu est celui dans la database

            if ($date2['invert'] == 0) { // condition pour check si la date de péremption est supérieur a la date actuel invert =1 si le datetime day est négatif

                //gestion du formulaire + traitement
                $form = $this->createForm(PasswordRecoveryFormType::class, $user);
                $form->handleRequest($request);

                if ($form->isSubmitted() && $form->isValid()) {
                    $user->setPassword(
                        $passwordhasher->hashPassword(
                            $user,
                            $form->get('password')->getData()
                        )
                    );
                    $user->setStatus(2);
                    $entityManager->persist($user);
                    $entityManager->flush();

                    $this->addFlash('success', 'Mot de passe validé !');
                    
                    return $this->redirectToRoute('app_login', [], Response::HTTP_SEE_OTHER);  
                }

                return $this->render('accueil/passwordRecovery.html.twig', [
                    'controller_name' => 'AcceuilController',
                    'form' => $form->createView(),
                    'token' => $token
                ]);
            } else { //changer le status sur 0 si le status =1

                if ($user->getStatus() == 1) {

                    $user->setStatus(0);
                    $user->setRoles(["provisoire"]);
                    $entityManager->persist($user);
                    $entityManager->flush();


                    $email = (new TemplatedEmail())
                        ->from('nepasrepondre@parcours-decouverte.app')
                        ->to($emailEnvoyerA)
                        ->subject('expiration du lien de validation de compte')

                        ->htmlTemplate('emails/peremption.html.twig')

                        ->context([
                            'user' => $user,
                        ]);

                    $mailer->send($email);
                } else {
                    $erreur = 0;
                }
            }
        } else { // changer le role et mdp sur provisoire et le status sur 0 avec un mail de comfirmation
            $erreur = 1;
            $user->setStatus(0);
            $user->setPassword("provisoire");
            $user->setRoles(["provisoire"]);
            $entityManager->persist($user);
            $entityManager->flush();

            $email = (new TemplatedEmail())
                ->from('nepasrepondre@parcours-decouverte.app')
                ->to($emailEnvoyerA)
                ->subject('probleme de sécurité sur votre compte')

                ->htmlTemplate('emails/reset.html.twig')

                ->context([
                    'user' => $user,
                ]);

            $mailer->send($email);
        }
        return $this->render('accueil/passwordErreur.html.twig', [
            'controller_name' => 'AcceuilController',
            'erreur' => $erreur,
        ]);
    }

    // /**
    //  * @Route("/test", name="test")
    //  */
    #[Route("/test", name: "test")]
    public function test(MailerInterface $mailer): Response
    {

        $email = (new Email())
            ->from('hello@example.com')
            ->to('you@example.com')
            ->subject('Time for Symfony Mailer!')
            ->text('Sending emails is fun again!')
            ->html('<p>See Twig integration for better HTML integration!</p>');

        $mailer->send($email);


        return new Response("ok");
    }

    // /**
    //  * @Route("/test2", name="test2")
    //  */
    #[Route("/test2", name: "test2")]
    public function test2(Tools $tools): Response
    {
        $id = $this->getUser()->getId();
        $tok = $tools->generate_token($id);

        //$tok = $tools->decode_token($tok);

        dd($tok);


        return new Response("ok");
    }
}
