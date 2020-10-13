<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

/**
 * Cette classe sert a générer le jeu de test en base de données
 * Nous allons nous en servir pour insérer les données initiales
 */
class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $categoriesNames = [
            'Symfony',
            'Javascript',
            'Java',
            'HTML/CSS',
            'Divers',
        ];

        foreach ($categoriesNames as $categoryName) {
            $category = new Category();
            $category->setName($categoryName);
            $manager->persist($category);
            // sert uniquement aux fixtures
            $this->addReference($categoryName, $category);
        }

        $manager->flush();
    }
}
