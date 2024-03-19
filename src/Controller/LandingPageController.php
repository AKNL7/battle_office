<?php

namespace App\Controller;

use App\Entity\Client;
use App\Form\ClientType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LandingPageController extends AbstractController
{
    #[Route('/', name: 'landing_page')]
    public function index(Request $request, EntityManagerInterface $entityManager ): Response
    {
        // Instancie un nouvel objet Client
        $client = new Client;  

// rappelle le form dans ClientType
// When creating the form, you should pass the $client object as the second argument to createForm(). This binds the form to the Client entity, allowing Symfony to automatically handle mapping the form data to the entity's properties.
        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())  {

            $entityManager->persist($client); 
            $entityManager->flush();

            return $this->redirectToRoute('confirmation');
        }
 
        
        $form = $form->createView();
        
        
        return $this->render('landing_page/index_new.html.twig', [
            'form' =>$form
        ]);
    }

    #[Route('/confirmation', name: 'confirmation')]
    public function confirmation(): Response
    {
        return $this->render('landing_page/confirmation.html.twig');
    }
}