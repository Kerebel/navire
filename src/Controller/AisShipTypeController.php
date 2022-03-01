<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AisShipTypeRepository;

/**
 * @Route("/aisshiptype", name="aisshiptype_")
 */
class AisShipTypeController extends AbstractController
{
    /**
     * @Route("/voirtous", name="voirtous")
     */
    public function voirTous(AisShipTypeRepository $repo): Response {
        $types = $repo->findAll();
        return $this->render('aisshiptype/voirtous.html.twig', [
                    'types' => $types,
        ]);
    }
}
