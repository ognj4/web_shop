<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartAddRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id'=> "required|exists:products,id", // id 5 mora da postoji u tabeli products
            'amount' => 'required|min:1',
        ];
    }
}
