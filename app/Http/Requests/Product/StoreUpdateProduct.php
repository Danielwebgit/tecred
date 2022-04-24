<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class StoreUpdateProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    #[ArrayShape([
        'name' => 'string',
        'quantity' => 'integer',
        'active' => 'bool',
        'category_id' => 'integer'
    ])]
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:150'],
            'quantity' => ['required', 'integer'],
            'active' => ['required', 'bool', 'max:30'],
            'category_id' => ['required', 'integer'],
        ];
    }
}
