<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

/**
 * Cette classe sert a générer le jeu de test en base de données
 * Nous allons nous en servir pour insérer les données initiales
 */
class ArticlesFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $article = new Article();
        $article->setCategory($this->getReference('Symfony'));
        $article->setTitle("SYMFONY - CRÉER UN BLOG PAS À PAS");
        $article->setContent("
        Dans un blog, les utilisateurs apprécient de pouvoir publier des commentaires.<br/><br/>
        Dans cet exemple, le choix est fait volontairement de ne pas demander aux visiteurs de s'inscrire, mais ce serait tout à fait possible.<br/><br/>
        Nous allons donc créer un formulaire en bas de chaque article pour permettre aux visiteurs de le commenter.<br/><br/>");
        $article->setCreatedAt(new \DateTime('6 months ago'));

        $manager->persist($article);

        $article = new Article();
        $article->setCategory($this->getReference('Symfony'));
        $article->setTitle("Guide du développeur Symfony pragmatique");
        $article->setContent("Symfony2 est réputé être un framework plutôt facile à prendre en main. En revanche, garder une cohérence d'ensemble dans l’architecture de son projet n'est pas chose aisée.<br/> Voici une petite synthèse des choses à retenir.");
        $article->setCreatedAt(new \DateTime('3 months ago'));

        $manager->persist($article);


        $article = new Article();
        $article->setCategory($this->getReference('Javascript'));
        $article->setTitle("Qu’est-ce que le JavaScript ?");
        $article->setContent("JavaScript est le langage de programmation de référence sur le web.");
        $article->setCreatedAt(new \DateTime('8 weeks ago'));

        $manager->persist($article);

        $article = new Article();
        $article->setCategory($this->getReference('Javascript'));
        $article->setTitle("Javascript Date : comment sortir de cet enfer, simplement?");
        $article->setContent("La gestion de date en JavaScript est pour le moins compliquée. Je dirais même que c'est un véritable enfer. ");
        $article->setCreatedAt(new \DateTime('6 weeks ago'));

        $manager->persist($article);

        $article = new Article();
        $article->setCategory($this->getReference('Divers'));
        $article->setTitle("Quand tu charges le site pour la première fois");
        $article->setContent('<img src="/img/cat.gif">');
        $article->setCreatedAt(new \DateTime('6 weeks ago'));

        $manager->persist($article);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            CategoryFixtures::class,
        );
    }
}
