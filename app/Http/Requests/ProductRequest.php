<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class ProductRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:30'],
            'quantity' => ['required', 'integer'],
            'active' => ['required', 'bool', 'max:30'],
            'category_id' => ['required', 'integer'],
        ];
    }
}
