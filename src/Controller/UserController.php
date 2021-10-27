<?php

namespace App\Controller;

use App\Entity\Tutorial;
use Doctrine\ORM\Query\Expr\Func;
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

    //----------------------get all users from db----------------------//
    
    /**
     * @Route("/allUsers", name="allUsers")
     */
    public function getAllUsers():Response{
        $users = $this->getDoctrine()
            ->getRepository(Tutorial::class)
            ->findAll();
        $allusers=json_encode($users);
            return new Response('Check out this great product: '.$allusers);
    }

    //show add user form
    public function novoUser()  
    {
                //------------------get all users from db-----------------------//
                $users = $this->getDoctrine()
                ->getRepository(Tutorial::class)
                ->findAll();
                $allusers=json_encode($users);
                //------------------get all users from db-----------------------//

        return $this->render('user/createuser.html.twig',['users'=>$users]);
    }
    public function adicionarUser(Request $request){

    }
}
