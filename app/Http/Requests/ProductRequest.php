<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; //! Important: change this to true to allow the request
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'name' => ['required', 'string'],
        'price' => ['required', 'numeric'],
        'qty' => ['required', 'integer'],
        'urls' => ['nullable','array', 'max:5'],
        'urls.*'=>[ 'url'],
        'images' => ['nullable', 'array', 'max:5'],
        'images.*' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:20048'],

    ];
    }
}
