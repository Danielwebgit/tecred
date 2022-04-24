<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreUpdateProduct;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Repositories\Product\ProductRepository;
use App\Services\Product\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(
        private ProductRepository $productRepository
    ){}
    /**
     * Display a listing of the resource.
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
     * Ver o produto.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Retorna vários produtos por categoria.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function filterForCategory($id)
    {
        dd('xs');
        $products = $this->productRepository->filterCategoryProducts($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
