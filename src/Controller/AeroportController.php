<?php

namespace App\Controller;
use Doctrine\Persistence\ManagerRegistry;
use App\Form\FormAeroType;
use App\Entity\Aeroport;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AeroportController extends AbstractController
{
    #[Route('/aeroport', name: 'app_aeroport')]
    public function index(): Response
    {
        return $this->render('aeroport/index.html.twig', [
            'controller_name' => 'AeroportController',
        ]);
    }
    #[Route('/list', name: 'aeroport_list')]
    public function list(EntityManagerInterface $entityManager): Response
    {
        $aeroports = $entityManager->getRepository(Aeroport::class)->findAll();

        return $this->render('aeroport/list.html.twig', [
            'aeroports' => $aeroports,
        ]);
    }
    #[Route('/aeroport/new', name: 'aeroport_new')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $aeroport = new Aeroport();
        $form = $this->createForm(FormAeroType::class, $aeroport);
    
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($aeroport);
            $entityManager->flush();
    
            return new RedirectResponse($this->generateUrl('aeroport_list'));
        }
    
        return $this->render('aeroport/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }
            #[Route('/aeroport/{id}/edit', name: 'aeroport_edit')]
public function edit(Request $request, Aeroport $aeroport, EntityManagerInterface $entityManager): Response
{
    $form = $this->createForm(FormAeroType::class, $aeroport);

    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager->flush();

        return new RedirectResponse($this->generateUrl('aeroport_list'));
    }

    return $this->render('aeroport/edit.html.twig', [
        'form' => $form->createView(),
        'aeroport' => $aeroport,
    ]);
}
          
}
