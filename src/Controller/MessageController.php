<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/message", name="message_")
 */
class MessageController extends AbstractController
{
    /**
     * @Route("/message", name="message")
     */
    public function contact(Request $request, GestionContact $gestionContact):Response {
        $message = new Message();
        
        $form = $this->createForm(MessageType::class, $message);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $message = $form->getData();
            
            $gestionContact->envoiMailcontact($message);
            
            return $this->redirectToRoute("home");
        }
        
        return $this->render('message/contact.html.twig', [
                    'form' => $form->createView(),
        ]);
    }
}
