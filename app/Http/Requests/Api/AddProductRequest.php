<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'name' => 'bail|required|string|max:255|unique:products,name',
            'code' => 'bail|required|string|max:32|unique:products,code',
            'collection_id' => 'required|integer|exists:collections,id',
        ];

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Pole jest wymagane.',
            'name.string' => 'Wprowadź wartość tekstową.',
            'name.max' => 'Pole wymaga maksymalnie :max znaków.',
            'name.unique' => 'Taki wpis już istnieje.',

            'code.required' => 'Pole jest wymagane.',
            'code.string' => 'Wprowadź wartość tekstową.',
            'code.max' => 'Pole wymaga maksymalnie :max znaków.',
            'code.unique' => 'Taki wpis już istnieje.',

            'collection_id.required' => 'Pole jest wymagane.',
            'collection_id.integer' => 'Błędny format danych.',
            'collection_id.exists' => 'Rekord nie istnieje',
        ];
    }
}
