<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'bail|required|string|min:3|max:128',
            'email' => 'bail|required|string|max:255|email:rfc,dns|unique:applications,email',
            'message' => 'bail|required|string|min:3|max:4096',
            'legal' => 'bail|required',
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
            'name.min' => 'Pole wymaga minimum :min znaków.',
            'name.max' => 'Pole wymaga maksymalnie :max znaków.',

            'email.required' => 'Pole jest wymagane.',
            'email.string' => 'Wprowadź wartość tekstową.',
            'email.max' => 'Pole wymaga maksymalnie :max znaków.',
            'email.email' => 'Błędny format wprowadzonych danych.',
            'email.unique' => 'Adres e-mail jest już zajęty.',

            'message.required' => 'Pole jest wymagane.',
            'message.string' => 'Wprowadź wartość tekstową.',
            'message.min' => 'Pole wymaga minimum :min znaków.',
            'message.max' => 'Pole wymaga maksymalnie :max znaków.',

            'legal.required' => 'Pole jest wymagane.',
        ];
    }
}
