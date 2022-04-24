<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class StoreUpdateCategory extends FormRequest
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
        'active' => 'bool',
    ])]
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:20'],
            'active' => ['required', 'bool']
        ];
    }
}
