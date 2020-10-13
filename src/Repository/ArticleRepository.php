<?php

namespace App\Repository;

use App\Entity\Article;
use App\Entity\Category;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    /**
     * Retourne les 3 derniers articles
     * @param $limit       la limite (par défaut 3)
     * @return Article[]   un tableau d'article (meme si un seul article)
     */
    public function findLastArticles($limit = 3)
    {
        return $this->createQueryBuilder('a')
            ->orderBy('a.createdAt', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult()
        ;
    }
    /**
     * Retourne les articles d'une catégorie
     */
    public function findArticlesOfCategory(Category $category)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.category = :categ')
            ->setParameter('categ', $category)
            ->getQuery()
            ->getResult()
            ;
    }
}
