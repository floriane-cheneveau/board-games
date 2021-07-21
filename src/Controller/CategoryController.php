<?php
// src/Controller/CategoryController.php
namespace App\Controller;
use App\Entity\Category;
use App\Entity\Game;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
     * @Route("/{categoryName}", name="show")
     * @return Response
     */
    public function show(string $categoryName): Response
    {
        $category = $this->getDoctrine()
            ->getRepository(Category::class)
            ->findOneBy(["name" => $categoryName]);
            
        if (!$category) {
            throw $this->createNotFoundException(
                'No category'
            );
        }
        $games = $this->getDoctrine()
            ->getRepository(Game::class)
            ->findBy(['category' => $category->getId()], ['id' => 'DESC'], 3);
                 return $this->render('category/show.html.twig', [
                 'games' => $games,
            ]);
    }
}