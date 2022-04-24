<?php

namespace App\Repositories\Product;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository
{
    public function __construct(
        private Product $model
    ){}

    public function getProducts(): Collection|array
    {
        return $this->model::query()->get();
    }

    public function filterCategoryProducts(int $category_id)
    {
        dd($category_id);
    }

    public function getProductById(int $product_id)
    {
        return $this->model::query()
        ->find($product_id);
    }

    public function findProduct(int $product_id): Collection|array
    {
        return $this->model::query()->select(
            'name',
            'quantity',
            'active'
            )->find($product_id);
    }

    public function updateProduct(array $validatedData, int $product_id)
    {
        return $this->model::query()
            ->where('id', $product_id)->select('name')
            ->update([
                'name' => $validatedData['name'],
                'quantity' => $validatedData['quantity'],
                'active' => $validatedData['active'],
                'category_id' => $validatedData['category_id'],
            ]);
    }
}
