<?php

namespace App\Service;

use DateTime;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class Tools
{

    private $router;
    private $mailer;

    public function __construct(MailerInterface $mailer, UrlGeneratorInterface $router)
    {
        $this->router = $router;
        $this->mailer = $mailer;
    }

    public function generate_token($id)
    {

        $token = [
            "date" => new DateTime(),
            "user" => $id,
            "rnd" => uniqid("", true)
        ];
        // dump($token);

        $token = json_encode($token);

        $token = base64_encode($token);

        return $token;
    }

    public function decode_token($token)
    {

        $token = base64_decode($token);

        $token = json_decode($token, true);



        return $token;
    }

    public function url($route, $tok)
    {
        $adresse = $this->router->generate($route, ['token' => $tok], UrlGeneratorInterface::ABSOLUTE_URL);

        return $adresse;
    }

    public function tableSplit($array, $value)
    {
        foreach ($array as $key => $liste) {
            if ($liste["organisme"] == $value) {
                $table[] = ["mois" => $liste["mois"], "nombre" => intval($liste["nombre"])]; // Ajout de intval pour avoir toute les valeurs du tableau en int 
            }
        }
        //dump($table);
        return $table;
    }

    public function sendEmailInvitation($to, $link, $user) {

        $email = (new TemplatedEmail())
        ->from("nepasrepondre@parcours-decouverte.app")
        ->to($to)
        ->subject('validation d\'inscription')

        ->htmlTemplate('emails/validation.html.twig')

        // pass variables (name => value) to the template
        ->context([
            'expiration_date' => new \DateTime('+30 days'),
            'lien' => $link,
            'user' => $user,
        ]);

        $this->mailer->send($email);
    }




    /**
     * @param array $array l'array contenant la requete à trier
     * @param boolean $boolean true return la liste des event, false return la liste des mois
     */
    public function encodeEtRemplirTableMois($array, $boolean)
    {
        $e = 0;
        $t = 0;
        // $moiL[] = "";
        $index = new DateTime();

        //*******************************************************
        //ajout de case vide au cas ou le tableau est trop petit
        //*******************************************************
        for ($i = 0; $i < 12; $i++) {
            $array[] = ["mois" => 0, "nombre" => 0];
        }
        //dd($array);

        //*******************************************************
        //récupération du moi actuel de l'année qui servira de référence
        //*******************************************************
        $index = intval($index->format('m')) + 1;

        //*******************************************************
        //condition pour que le moi soit inclue entre 1 et 12
        //*******************************************************
        if ($index > 12) {
            $index = 1;
        }

        //*******************************************************
        //boucle de trie
        //******************************************************
        for ($i = 0; $i < 12; $i++) {
            if ($array[$t]['mois'] == $index) {
                $mois[] = $index;
                $nbrEvent[] = $array[$i - $e]['nombre'];
                $t++;
            } else {
                $mois[] = $index;
                $nbrEvent[] = 0;
                $e++;
            }
            $index++;
            if ($index > 12) {
                $index = 1;
            }
        }
        //********************************************************
        // conversion de liste des nombres de mois en lettre
        //********************************************************
        foreach ($mois as $key => $nb) {
            if ($nb == 1) {
                $moisL[] = "Janvier";
            }
            if ($nb == 2) {
                $moisL[] = "Février";
            }
            if ($nb == 3) {
                $moisL[] = "Mars";
            }
            if ($nb == 4) {
                $moisL[] = "Avril";
            }
            if ($nb == 5) {
                $moisL[] = "Mai";
            }
            if ($nb == 6) {
                $moisL[] = "Juin";
            }
            if ($nb == 7) {
                $moisL[] = "Juillet";
            }
            if ($nb == 8) {
                $moisL[] = "Août";
            }
            if ($nb == 9) {
                $moisL[] = "Septembre";
            }
            if ($nb == 10) {
                $moisL[] = "Octobre";
            }
            if ($nb == 11) {
                $moisL[] = "Novembre";
            }
            if ($nb == 12) {
                $moisL[] = "Décembre";
            }
        }
        //dd($moisL);

        if ($boolean == true) {
            return json_encode($nbrEvent);
        } else {
            return json_encode($moisL);
        }
    }
}
