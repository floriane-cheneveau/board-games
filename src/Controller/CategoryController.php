<?php
// src/Controller/CategoryController.php
namespace App\Controller;
use App\Entity\Category;
use App\Repository\CategoryRepository;
use App\Entity\Game;
use App\Repository\GameRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 
 * @Route("/categories", name="category_")
 */
class CategoryController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        $categories = $this->getDoctrine()
            ->getRepository(Category::class)
            ->findAll();

        return $this->render(
            'category/index.html.twig',
            ['categories' => $categories]
        );
    }

    /**
     * @Route("/show/{categoryId}", name="show")
     * @ParamConverter("category", class="App\Entity\Category", options= {"mapping": {"categoryId": "id"}})
     */
    public function show(Category $category, CategoryRepository $categoryRepository, GameRepository $gameRepository): Response
    {
        $category = $categoryRepository->findOneById([$category]);
            
        if (!$category) {
            throw $this->createNotFoundException(
                'No category'
            );
        }
        $games = $gameRepository->findBy(['Category' => $category], ['id' => 'DESC'], 3);
                 return $this->render('category/show.html.twig', [
                 'games' => $games,
                 'category' => $category,
            ]);
    }
}