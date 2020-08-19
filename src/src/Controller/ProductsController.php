<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\ProductsRepository;
use App\MeteoApi;

class ProductsController extends AbstractController
{
    private $productsRepository;
    
    public function __construct(ProductsRepository $productsRepository)
    {
        $this->productsRepository = $productsRepository;
    }
    
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        $output = array(
            'message' => 'Welcome to products by weather API!',
            'important' => 'Read the documentation first.',
            'documentation' => 'documentation_link',
            'author' => 'N.L.',
        );
        return new JsonResponse($output, Response::HTTP_OK);
    }

    /**
     * @Route("/api", name="api")
     */
    public function notfound()
    {
        $output = array(
            'message' => 'Wrong link!',
            'documentation' => 'documentation_link',
            'author' => 'N.L.',
        );
        return new JsonResponse($output, Response::HTTP_OK);
    }

    /**
     * @Route("/api/products/recommended/{city}", name="recomended", methods={"GET"})
     */
    public function getRecomended($city): JsonResponse
    {
        $meteoapi = new MeteoApi();
        $weather=$meteoapi->getConditions($city);
        $products = $this->productsRepository->findBy(['weather' => $weather], ['id' => 'ASC'], 10);
        $data = [];

        foreach ($products as $product) {

            $data[] = $product->toArray();
            
        }
        $output = array("city" => $city, "current_weather" => $weather, "recommended_products" => $data);
        return new JsonResponse($output, Response::HTTP_OK);
    }
}
