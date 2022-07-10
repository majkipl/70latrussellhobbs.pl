<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplicationRequest extends FormRequest
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
     * @return array
     */
    public function rules(): array
    {
        $rules = [
            'firstname' => 'bail|required|string|min:3|max:128',
            'lastname' => 'bail|required|string|min:3|max:128',
            'address' => 'bail|required|string|max:255',
            'address_nb' => 'bail|required|string|max:32',
            'city' => 'bail|required|string|min:2|max:128',
            'zip' => 'bail|required|regex:/^[0-9]{2}\-[0-9]{3}$/',
            'email' => 'bail|required|string|max:255|email:rfc,dns|unique:applications,email',
            'phone' => [
                'bail',
                'required',
                'regex:/^\+48(\s)?([1-9]\d{8}|[1-9]\d{2}\s\d{3}\s\d{3}|[1-9]\d{1}\s\d{3}\s\d{2}\s\d{2}|[1-9]\d{1}\s\d{2}\s\d{3}\s\d{2}|[1-9]\d{1}\s\d{2}\s\d{2}\s\d{3}|[1-9]\d{1}\s\d{4}\s\d{2}|[1-9]\d{2}\s\d{2}\s\d{2}\s\d{2}|[1-9]\d{2}\s\d{3}\s\d{2}|[1-9]\d{2}\s\d{4})$/'
            ],
            'shop' => 'bail|required|numeric|exists:shops,id',
            'img_receipt' => 'bail|required|file|mimes:jpeg,jpg,png|max:4096',
            'product_1' => 'bail|required|numeric|exists:products,id',
            'img_ean_1' => 'bail|required|file|mimes:jpeg,jpg,png|max:4096',
            'is_product_2' => 'bail|nullable',
            'whence' => 'bail|required|numeric|exists:whences,id',
            'type_shop' => 'bail|required|numeric|exists:type_shops,id',
            'legal_1' => 'bail|required',
            'legal_2' => 'bail|required',
            'legal_3' => 'bail',
            'legal_4' => 'bail',
        ];

        if ($this->input('whence') == 5) {
            $rules['where_other'] = 'bail|required|max:255';
        }

        if ($this->input('is_product_2') !== null) {
            $rules['product_2'] = 'bail|required|numeric|exists:products,id';
            $rules['img_ean_2'] = 'bail|required|file|mimes:jpeg,jpg,png|max:4096';
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
            'firstname.required' => 'Pole jest wymagane.',
            'firstname.string' => 'Wprowadź wartość tekstową.',
            'firstname.min' => 'Pole wymaga minimum :min znaków.',
            'firstname.max' => 'Pole wymaga maksymalnie :max znaków.',
            'lastname.required' => 'Pole jest wymagane.',
            'lastname.string' => 'Wprowadź wartość tekstową.',
            'lastname.min' => 'Pole wymaga minimum :min znaków.',
            'lastname.max' => 'Pole wymaga maksymalnie :max znaków.',
            'address.required' => 'Pole jest wymagane.',
            'address.string' => 'Wprowadź wartość tekstową.',
            'address.max' => 'Pole wymaga maksymalnie :max znaków.',
            'address_nb.required' => 'Pole jest wymagane.',
            'address_nb.string' => 'Wprowadź wartość tekstową.',
            'address_nb.max' => 'Pole wymaga maksymalnie :max znaków.',
            'city.required' => 'Pole jest wymagane.',
            'city.string' => 'Wprowadź wartość tekstową.',
            'city.min' => 'Pole wymaga minimum :min znaków.',
            'city.max' => 'Pole wymaga maksymalnie :max znaków.',
            'zip.required' => 'Pole jest wymagane.',
            'zip.regex' => 'Błędny format wprowadzonych danych.',
            'phone.required' => 'Pole jest wymagane.',
            'phone.regex' => 'Błędny format wprowadzonych danych.',
            'email.required' => 'Pole jest wymagane.',
            'email.string' => 'Wprowadź wartość tekstową.',
            'email.max' => 'Pole wymaga maksymalnie :max znaków.',
            'email.email' => 'Błędny format wprowadzonych danych.',
            'email.unique' => 'Adres e-mail jest już zajęty.',

            'shop.required' => 'Pole jest wymagane.',
            'shop.number' => 'Wybierz prawidłową wartość.',
            'shop.exists' => 'Wybierz prawidłową wartość.',

            'img_receipt.required' => 'Pole jest wymagane.',
            'img_receipt.file' => 'Pole wymaga pliku.',
            'img_receipt.mimes' => 'Dopuszczalne typy plików jpeg,jpg,png.',
            'img_receipt.max' => 'Plik nie może być większy niż 4MB.',

            'product_1.required' => 'Pole jest wymagane.',
            'product_1.number' => 'Wybierz prawidłową wartość.',
            'product_1.between' => 'Wybierz prawidłową wartość.',

            'img_ean_1.required' => 'Pole jest wymagane.',
            'img_ean_1.file' => 'Pole wymaga pliku.',
            'img_ean_1.mimes' => 'Dopuszczalne typy plików jpeg,jpg,png.',
            'img_ean_1.max' => 'Plik nie może być większy niż 4MB.',

            'product_2.required' => 'Pole jest wymagane.',
            'product_2.number' => 'Wybierz prawidłową wartość.',
            'product_2.between' => 'Wybierz prawidłową wartość.',

            'img_ean_2.required' => 'Pole jest wymagane.',
            'img_ean_2.file' => 'Pole wymaga pliku.',
            'img_ean_2.mimes' => 'Dopuszczalne typy plików jpeg,jpg,png.',
            'img_ean_2.max' => 'Plik nie może być większy niż 4MB.',

            'whence.required' => 'Pole jest wymagane.',
            'whence.number' => 'Wybierz prawidłową wartość.',
            'whence.between' => 'Wybierz prawidłową wartość.',

            'where_other.required' => 'Pole jest wymagane.',
            'where_other.max' => 'Pole wymaga maksymalnie :max znaków.',

            'type_shop.required' => 'Pole jest wymagane.',
            'type_shop.number' => 'Wybierz prawidłową wartość.',
            'type_shop.between' => 'Wybierz prawidłową wartość.',

            'legal_1.required' => 'Pole jest wymagane.',
            'legal_2.required' => 'Pole jest wymagane.',
        ];
    }
}
