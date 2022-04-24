<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreUpdateCategory;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Repositories\Category\CategoryRepository;
use App\Services\Category\CategoryService;

class CategoryController extends Controller
{

    public function __construct(
        private CategoryRepository $categoryRepository
    ){}
    /**
     * Retorna a lista de todas as categorias.
     *
     */
    public function index()
    {
        $categories = $this->categoryRepository->getCategories();
        return CategoryResource::collection($categories);
    }

    /**
     * Cadastra a categoria.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(
        StoreUpdateCategory $request,
        CategoryService $categoryService
        )
    {
        $category = $categoryService->createCategory($request->validated());

        if (! $category)
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
     * Atualiza o nome da categoria
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateCategory $request, $id)
    {
        dd($request);
    }

    /**
     * Remove da lista de categorias.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($category)
    {
        $category = Category::find($category)->delete();

        return response()->json('Deletado com sucesso!', 204);
    }
}
