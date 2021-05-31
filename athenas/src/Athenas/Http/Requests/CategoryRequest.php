<?php

namespace Athenas\Http\Requests;

use Illuminate\Foundation\Http\FormRequest as FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
{
    /**
     * Determina se o usuário está autorizado
     * para realizar a operação.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Define as regras de validação 
     * do modelo.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code' => [
                'required', 
                Rule::unique('categories', 'code')->ignore($this->category)
            ], 
            'name' => 'required'
        ];
    }
}