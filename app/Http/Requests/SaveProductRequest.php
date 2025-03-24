<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name' => 'required|unique:products',
            'description' => 'required',
            'amount' =>'required|int|min:0',
            'price' => 'required|min:0',
            'image' => 'required'
        ];
    }
}


