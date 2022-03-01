<?php

namespace App\Controller;

use App\Entity\Port;
use App\Form\PortType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/port", name="port_")
 */
class PortController extends AbstractController
{
    /**
     * @Route("/creer", name="creer")
     */
    public function creer(Request $request, EntityManagerInterface $manager): Response
    {
        $port = new Port();
        //$Paysrepo->findAll()
        $form= $this->createForm(PortType::class, $port);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $manager->persist($port);
            $manager->flush();
            return $this->redirectToRoute('home');
        }
        return $this->render('port/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
