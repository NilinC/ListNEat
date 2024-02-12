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
    const DEFAULT_FILTER = 'category';
    const CATEGORY = 'category';
    const STORAGE = 'storage';
    CONST EXPIRATION_DATE = 'expiration_date';

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

    public function getIngredients(): array
    {
        return $this->createQueryBuilder('i')
            ->orderBy('i.expirationDate', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    public function sortIngredientsByFilter(array $ingredients, string $filter): array
    {
        $sortedIngredients = [];

        if (self::CATEGORY === $filter) {
            foreach ($ingredients as $ingredient) {
                $sortedIngredients[$ingredient->getCategory()->getName()][] = $ingredient;
            }
        } elseif (self::STORAGE === $filter) {
            foreach ($ingredients as $ingredient) {
                $sortedIngredients[$ingredient->getStorage()->getName()][] = $ingredient;
            }
        } elseif (self::EXPIRATION_DATE === $filter) {
            foreach ($ingredients as $ingredient) {
                $dateKey = "";
                if ($ingredient->getExpirationDate()) {
                    $dateKey = $ingredient->getExpirationDate()->format('m-Y');
                }

                $sortedIngredients[$dateKey][] = $ingredient;
            }
        } else {
            // renvoyer un message comme quoi le filtrage n'existe pas

            return $ingredients;
        }

        return $sortedIngredients;
    }

    public function getDefaultFilter(): string
    {
        return self::DEFAULT_FILTER;
    }


}
