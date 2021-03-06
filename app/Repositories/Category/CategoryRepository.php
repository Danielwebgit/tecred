<?php

namespace App\Repositories\Category;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository
{
    public function __construct(
        private Category $model
    ){}

    public function getcategories(): Collection|array
    {
        return $this->model::query()->get();
    }

    public function findCategory(int $category_id): Collection|array
    {
        return $this->model::query()->select('name', 'active')->find($category_id);
    }

    public function updateCategory(array $validatedData, int $category_id){
        return $this->model::query()
        ->where('id', $category_id)
        ->update([
            'name' => $validatedData['name'],
            'active' => $validatedData['active']
        ]);
    }
}
