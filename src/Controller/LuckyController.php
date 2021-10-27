<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Message;
use Symfony\Component\Routing\Annotation\Route;


class LuckyController extends AbstractController
{
    public function number(): Response
    {
        $number = random_int(0, 100);
        
        return $this->render('lucky/number.html.twig', [
            'number' => $number,
        ]);
    }
    public function homepage() 
    {
        return $this->render(view:'lucky/index.html.twig');
    }
    

    /**
     * @Route("/custom/{name?}", name="custom")
     * @param Request $request
     * return Response
     */
    public function custom(Request $request){
        $name = $request->get(key:'name');
        
        return $this->render('lucky/custom.html.twig',['name'=> $name]);

    }














}
