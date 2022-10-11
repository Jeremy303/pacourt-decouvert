<?php

namespace App\Service;

use DateTime;
use Exception;
use Twig\TwigFilter;
use App\Entity\Agence;
use App\Entity\Releve;
use Twig\TwigFunction;
use App\Entity\Contrat;
use Twig\Extension\AbstractExtension;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class TwigToolBox extends AbstractExtension
{
    private $requestStack;
    private $em;
    private $kernel;

    public function __construct(RequestStack $requestStack, EntityManagerInterface $em, KernelInterface $kernel)
    {
        $this->requestStack = $requestStack;
        $this->em = $em;
        $this->kernel = $kernel;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('activeMenu', [$this, 'activeMenu']),
        ];
    }

    public function getFilters()
    {
        return [
            new TwigFilter('heure', [$this, 'convertionHeure']),
            new TwigFilter('host_part', [$this, 'getSiteName']),
            new TwigFilter('weekNumberToMonday', [$this, 'weekNumberToMonday'])

        ];
    }

    public function convertionHeure($ch)
    {
        if (is_numeric($ch)) {
            if ($ch==0) 
                return "";
            $h = intval($ch);
            $m = round(($ch-$h)*60, 0);
            if ($m==0)
                return $h . "h";
            else
                return  $h . "h" . sprintf("%02d", $m);
        }
        
        return $ch;
    }

    public function weekNumberToMonday($week)
    {
        $lundi = DateTime::createFromFormat("Y-m-d", date("Y-m-d", strtotime(str_replace("-", "W", $week))));
        return $lundi->format("Y-m-d");
    }

    public function getSiteName($url)
    {
        $nomSite = parse_url($url, PHP_URL_HOST);

        return $nomSite;

    }

    // /**
    //  * Pass route names. If one of route names matches current route, this function returns
    //  * pour li: 'active nav-item py-3' = la classe d'un li actif dans nav sinon class par défaut 'nav-item py-3'
    //  * pour a: 'font-weight-bold nav-link' = la classe d'un a actif dans nav sinon class par défaut 'nav-link'
    //  * @param array $routesToCheck
    //  * @return string
    //  */
    // public function activeMenu(array $routesToCheck, $balise)
    // {
    //     //préparation des variables text pour personnaliser classes
    //     //je ne mets que ce qui est suseptible d'être modifié (un nav-link restera un nav-link)
    //     $cActive = 'actif';
    //     $cFontW = 'font-weight-bold';
    //     //j'ai gardé un tableau routesToCheck en entrée mais une chaine faisait l'affaire dans le cas présent
    //     //c'est pour pouvoir remanier + facilement au besoin

    //     $currentRoute = $this->requestStack->getCurrentRequest()->get('_route');

    //     foreach ($routesToCheck as $routeToCheck) {
    //         switch ($balise) {
    //             case 'li':
    //                 if ($routeToCheck == $currentRoute) {
    //                     return $cActive.' nav-item py-3';    
    //                 }else{
    //                     return 'nav-item py-3';    
    //                 }
    //                 break;
    //             case 'a':
    //                 if ($routeToCheck == $currentRoute) {
    //                     return $cFontW.' nav-link';    
    //                 }else{
    //                     return 'nav-link';    
    //                 }
    //                 break;
    //             case 'li-dropdown':
    //                 if ($routeToCheck == $currentRoute) {
    //                     return $cActive.' dropdown nav-item py-3';    
    //                 }else{
    //                     return 'dropdown nav-item py-3';    
    //                 }
    //                 break;
    //             case 'a-dropdown':
    //                 if ($routeToCheck == $currentRoute) {
    //                     return $cFontW.' nav-link dropdown-toggle';    
    //                 }else{
    //                     return 'nav-link dropdown-toggle';    
    //                 }
    //                 break;
    //         }
    //     }
    // }

    /**
     * @param array $routesToCheck
     * @return string
     */
    public function activeMenu(array $routesToCheck)
    {
        $currentRoute = $this->requestStack->getCurrentRequest()->get('_route');
        //dd($routesToCheck);

        if (in_array($currentRoute, $routesToCheck)) {
            return "font-weight-bold active";
        }
        return "";
    }

}