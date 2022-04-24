<?php

namespace App\Services\Product;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductService
{
    public function __construct(
        private Product $model
    ){}

    public function createProduct(array $productData)
    {
        return $this->model->query()->create([
            'name' => $productData['name'],
            'quantity' => $productData['quantity'],
            'active' => $productData['active'],
            'category_id' => $productData['category_id']
        ]);
    }

    public function updateProduct(array $productData){
        dd($productData);
    }
}
