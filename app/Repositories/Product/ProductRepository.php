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

    public function findProduct(int $product_id): Collection|array
    {
        return $this->model::query()->select(
            'name',
            'quantity',
            'active'
            )->find($product_id);
    }
}
