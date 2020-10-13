<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class HelloController extends AbstractController
{
    /**
     * @Route("/hello/world", name="hello_world")
     */
    public function hello()
    {
        return $this->render('hello/hello.html.twig');
    }

    /**
     * @Route("/hello/{number}", name="hello_number", requirements={"number"="\d+"})
     */
    public function helloNumber($number)
    {
        $worlds = '';
        for ($i = 1; $i <= $number; $i++) {
            $worlds = $worlds . ' world';
        }

        return $this->render('hello/hello_number.html.twig', array(
            'worlds' => $worlds,
        ));
    }

    /**
     * @Route("/hello/{firstname}", name="hello_firstname")
     */
    public function helloFirstname($firstname)
    {
        return $this->render('hello/hello_firstname.html.twig', array(
            'name' => $firstname,
        ));
    }

}
