<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Order;
use App\Entity\BillingAdress;
use App\Form\ClientType;
use App\Form\formType;
use App\Form\OrderType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use \Symfony\Component\Form\FormView;

class LandingPageController extends AbstractController
{
    #[Route('/', name: 'landing_page')]
    public function index(Request $request, EntityManagerInterface $entityManager ): Response
    {
        // Instancie un nouvel objet Client
        $client = new Client;  
        $order = new Order; 

// rappelle le form dans ClientType

// When creating the form, you should pass the $client object as the second argument to createForm(). This binds the form to the Client entity, allowing Symfony to automatically handle mapping the form data to the entity's properties.
       
        // $form = $this->createForm(ClientType::class, $client);
        // $form = $this->createForm(OrderType::class, $order); 

        // créer le formulaire Billing et Shipping et l'inclure dans le formulaire Client
        $form = $this->createForm(ClientType::class); // TOn formulaire principale
       
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())  {
            dd($client);
         
            $entityManager->persist($client); 
            $entityManager->flush();
          
            return $this->redirectToRoute('confirmation');
        }
 
        
        // $form = $form->createView();
        
        
        return $this->render('landing_page/index_new.html.twig', [
            'form' =>$form->createView()
        ]);
    }







    #[Route('/confirmation', name: 'confirmation')]
    public function confirmation(): Response
    {
        return $this->render('landing_page/confirmation.html.twig');
    }
}