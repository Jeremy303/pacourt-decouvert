<?php

namespace App\Service;

use App\Entity\Evenement;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class Statistiques
{

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function stat1()
    {
        $repo = $this->em->getRepository(Evenement::class);

        
        

        return ["321", "987", "654"];
    }

    

   

}
