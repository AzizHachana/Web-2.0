<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ServiceController extends AbstractController
{
    #[Route(path: '/service/{name}', name: 'app_service', defaults:["name" => null])]
    public function index($name): Response
    {
        return $this->render('service/index.html.twig', [
            'nom' => $name,
        ]);
    }
    
    #[Route('/redirect', name:'')]
    public function goToIndex(){
        return $this->redirectToRoute("app_service");
    }

    
}
