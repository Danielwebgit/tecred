<?php

namespace App\Services\Player;

use App\Models\Product;
use Illuminate\Support\Facades\Hash;

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
            'active' => $productData['active'],
        ]);
    }
}