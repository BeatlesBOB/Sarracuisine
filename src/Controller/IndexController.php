<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use App\Repository\TypesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(ProductRepository $productRepository): Response
    {

        return $this->render('index/index.html.twig', [
            "products" => $productRepository->getMostPopularArticles()
        ]);
    }

    /**
     * @Route("/categories/{types}", name="types")
     */
    public function types(): Response
    {

        return $this->render('index/types.html.twig', [

        ]);
    }
}
