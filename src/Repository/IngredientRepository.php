<?php

namespace App\Repository;

use App\Entity\Ingredient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Ingredient>
 *
 * @method Ingredient|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ingredient|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ingredient[]    findAll()
 * @method Ingredient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IngredientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, private readonly EntityManagerInterface $entityManager)
    {
        parent::__construct($registry, Ingredient::class);
    }

    public function addIngredient(Ingredient $ingredient): void
    {
        $this->entityManager->persist($ingredient);
        $this->entityManager->flush();
    }

    public function removeIngredient(Ingredient $ingredient): void
    {
        $this->entityManager->remove($ingredient);
        $this->entityManager->flush();
    }

    public function sortIngredientsByCategories(array $ingredients): array
    {
        $sortedIngredientsByCategory = [];
        foreach ($ingredients as $ingredient) {
            $sortedIngredientsByCategory[$ingredient->getCategory()->getName()][] = $ingredient;
        }

        return $sortedIngredientsByCategory;
    }
}
