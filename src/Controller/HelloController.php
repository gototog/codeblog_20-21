<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{
    /**
     * @Route("/hello/world", name="hello_world")
     */
    public function hello()
    {
        return new Response(
            '<html><body>Hello WORLD!</body></html>'
        );
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
        return new Response(
            '<html><body>Hello ' . $worlds . '</body></html>'
        );
    }

    /**
     * @Route("/hello/{firstname}", name="hello_firstname")
     */
    public function helloFirstname($firstname)
    {
        return new Response(
            '<html><body>Hello ' . $firstname . '</body></html>'
        );
    }

}
