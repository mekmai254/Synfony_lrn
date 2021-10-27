<?php

namespace App\Controller;

use App\Entity\Tutorial;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="create_user")
     */
    public function createUser():  Response 
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
        $userManager = $this->getDoctrine()->getManager();

        $user =new Tutorial();
        $user->setName('danilo');
        $user->setSurname('soares');
        $user->setAge(23);
        $user->setCountry('portugal');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $userManager->persist($user);
        
        // actually executes the queries (i.e. the INSERT query)
        $userManager->flush();

        return new Response('Saved new product with id '.$user->getId());
    }
    public function novoUser()  
    {
        return $this->render('user/createuser.html.twig');
    }
}
