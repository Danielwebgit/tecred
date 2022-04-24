<?php

namespace App\Services\Category;

use App\Models\Category;

class CategoryService
{
    public function __construct(
        private Category $model
    ){}

    public function createCategory(array $categoryData)
    {
        return $this->model->query()->create([
            'name' => $categoryData['name'],
            'active' => $categoryData['active'],
        ]);
    }
}
