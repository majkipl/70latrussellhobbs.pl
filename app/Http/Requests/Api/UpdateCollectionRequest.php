<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCollectionRequest extends FormRequest
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
            'name' => 'bail|required|string|max:128',
            'id' => 'required|integer|exists:collections,id'
        ];

        if ($this->input('slug') !== null) {
            $rules['slug'] = 'bail|string|max:128';
        }

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

            'id.required' => 'Pole jest wymagane',
            'id.integer' => 'Wprowadź prawidłową wartość',
            'id.exists' => 'Rekord nie istnieje',

            'slug.string' => 'Wprowadź wartość tekstową.',
            'slug.max' => 'Pole wymaga maksymalnie :max znaków.',
        ];
    }
}
