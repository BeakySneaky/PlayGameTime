<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProduitRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nom' => 'required|max:100',
            'description' => 'max:255',
            'prix' => 'required|numeric|min:0.99|max:1000.00',
            'type_id' => 'required|exists:types,id'
        ];
    }

    public function messages()

    {
        return [
            'type_id.required' => 'Le produit doit être associé à une console.',
        ];
    }
}