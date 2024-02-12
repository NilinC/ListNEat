<?php

namespace App\Controller;

use App\Entity\Ingredient;
use App\Form\Type\IngredientType;
use App\Repository\IngredientRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class IngredientController extends AbstractController
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager,
        private readonly IngredientRepository $ingredientRepository
    ) {}

    #[Route('/{filter?}', name: 'list_ingredients', methods: ['GET'])]
    public function list(Request $request): Response
    {
        $ingredients = $this->ingredientRepository->getIngredients();
        $filter = $request->attributes->get('filter') ?: $this->ingredientRepository->getDefaultFilter();

        if (!empty($ingredients)) {
            $ingredients = $this->ingredientRepository->sortIngredientsByFilter($ingredients, $filter);
        }

        return $this->render(
            'ingredient/list.html.twig',
            [
                'ingredientsList' => $ingredients,
                'filter' => $filter
            ]
        );
    }

    #[Route('/update/{id?}', name: 'update_ingredient', methods: ['GET', 'POST'])]
    public function update(Request $request): Response
    {
        $parameter = $request->attributes->get('id') ?: null;
        $ingredient = $this->entityManager->getRepository(Ingredient::class)->findOneBy([ 'id' => $parameter ]);

        if (!$ingredient) {
            $ingredient = new Ingredient();
        }

        $form = $this->createForm(IngredientType::class, $ingredient);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ingredient = $form->getData();

            $this->ingredientRepository->addIngredient($ingredient);

            return $this->redirectToRoute('list_ingredients');
        }

        return $this->render(
            'ingredient/form.html.twig',
            [ 'form' => $form ]
        );
    }

    #[Route('/remove/{id}', name: 'remove_ingredient', methods: [ 'GET', 'DELETE' ])]
    public function remove(Request $request): Response
    {
        $parameter = $request->attributes->get('id');
        $ingredient = $this->entityManager->getRepository(Ingredient::class)->findOneBy([ 'id' => $parameter]);

        $this->ingredientRepository->removeIngredient($ingredient);

        return $this->redirectToRoute('list_ingredients');
    }
}
