<?php

namespace App\Controller;

use App\Service\Statistiques;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StatistiqueController extends AbstractController
{
    #[Route('/statistique', name: 'statistique')]
    public function index(Statistiques $stat): Response
    {
        $resultat = $stat->stat1();
        return $this->render('statistique/index.html.twig', [
            'resultat' => $resultat,
        ]);
    }
}
