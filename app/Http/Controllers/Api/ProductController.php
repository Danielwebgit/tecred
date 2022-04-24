<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreUpdateProduct;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Repositories\Product\ProductRepository;
use App\Services\Product\ProductService;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    public function __construct(
        private ProductRepository $productRepository
    ){}

    /**
     * Lista todos os produtos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productRepository->getProducts();
        return ProductResource::collection($products);
    }

    /**
     * Cadastra o produto.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(
        StoreUpdateProduct $request,
        ProductService $productService,
    )
    {
        $products = $productService->createProduct($request->validated());

        if (! $products)
        {
            return response()->json([
                'data' => []
            ], 404);
        }

        return response()->json([
            'data' => ["Cadastro realizado com sucesso!"]
        ]);
    }

    /**
     * Ver o produto e a categoria.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $product = $this->productRepository->getProductById($id);
        return new ProductResource($product);
    }

    /**
     * Retorna vários produtos por categoria.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function filterForCategory($id)
    {
        $products = $this->productRepository->filterCategoryProducts($id);
    }

   /**
     * Cadastra o produto.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProduct $request, $id)
    {
        $updateProdutct = $this->productRepository->updateProduct(
            $request->validated(), $id
        );

        if (! $updateProdutct)
        {
            return response()->json([
                'data' => []
            ], 404);
        }

        return response()->json([
            'data' => ["Atualizado com sucesso!"]
        ]);
    }

    /**
     * Remove o produto em questão.
     */
    public function destroy(Product $product): JsonResponse
    {
        $product->delete();
        return response()->json(null, 204);
    }
}
