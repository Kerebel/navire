<?php

namespace App\Controller;

use App\Repository\AisShipTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/aisshiptype", name="aisshiptype_")
 */
class AisShipTypeController extends AbstractController
{
    /**
     * @Route("/voirtous", name="voirtous")
     */
    public function voirTous(): Response {
        $types = [
            1 => 'Reserved',
            2 => 'Wing In Ground',
            3 => 'Special Category',
            4 => 'High-Speed Craft',
            5 => 'Special Category',
            6 => 'Passenger',
            7 => 'Cargo',
            8 => 'Tanker',
            9 => 'Other',
        ];
        return $this->render('aisshiptype/voirtous.html.twig', [
                    'types' => $types,
        ]);
    }
    
    /**
     * 
     * @Route("/portscompatibles", name="portscompatibles")
     */
    public function portsCompatibles(Request $request, AisShipTypeRepository $repo): Response {
        $type = $repo->$request->get(find("id"));
        return $this->render('aisshiptype/portscompatibles.html.twig', [
                    'lesPorts' => $lesPorts,
                    'lesTypes' => $lesTypes,
        ]);
    }
}
