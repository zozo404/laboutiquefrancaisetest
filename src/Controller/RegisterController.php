<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Form\RegisterType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactory;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use
Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;





class RegisterController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher){
        $this->entityManager = $entityManager;
        $this->passwordHasher= $passwordHasher;

    }

    #[Route('/inscription', name: 'app_register')]
    public function index(Request $request, UserPasswordHasherInterface $passwordHasher): Response
    {   
        $user = new User();
        $form = $this->createForm(RegisterType::class, $user);

        $form ->HandleRequest($request);

        if ($form->isSubmitted() && $form->isValid() ){

            $user = $form->getData();
            $plaintextPassword = $user->getPassword();
            
            $hashedPassword = $passwordHasher->hashPassword($user, $plaintextPassword);
            $user->setPassword($hashedPassword);
           

           $this->entityManager->persist($user);
           $this->entityManager->flush();

        }

        return $this->render('register/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}