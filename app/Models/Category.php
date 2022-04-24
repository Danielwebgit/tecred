<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'active'
    ];

    public function product(){
        return $this->hasOne(Product::class, 'category_id', 'id');
    }
}
