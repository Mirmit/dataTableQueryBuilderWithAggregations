<?php

namespace App\Controller;

use App\Datatable\ProductDataTableType;
use App\Repository\ProductRepository;
use Kreyu\Bundle\DataTableBundle\DataTableFactoryAwareTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ExampleDatatableController extends AbstractController
{
    use DataTableFactoryAwareTrait;

    public function __construct(
        private readonly ProductRepository $productRepository
    )
    {
    }
    #[Route('/example_datatable', name: 'example_datatable')]
    public function list(Request $request): Response
    {
        $productSumQueryBuilder = $this->productRepository->salesAmountSumByCategoryQB();
        $dataTable = $this->createDataTable(ProductDataTableType::class, $productSumQueryBuilder);
        $dataTable->handleRequest($request);

        return $this->render('example_datatable.html.twig', [
            'products' => $dataTable->createView(),
        ]);
    }
}