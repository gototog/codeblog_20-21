<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use App\Entity\Category;

class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepage()
    {
        $categories = $this->getDoctrine()
            ->getRepository(Category::class)->findAll();
        $article = $this->getDoctrine()
            ->getRepository(Article::class)->findOneBy([]);

        return $this->render('base_home.html.twig', [
            'categories' => $categories,
            'lastArticle' => $article,
        ]);
    }
}
