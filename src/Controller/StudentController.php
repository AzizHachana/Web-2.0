<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Student;

class StudentController extends AbstractController
{
    #[Route('/student', name: 'app_student')]
    public function index(EntityManagerInterface $em): Response
    {
        $students = $em->getRepository(Student::class)->findAll(); 



        return $this->render('student/index.html.twig', [
            'students' => $students,
        ]);
    }

    
}

