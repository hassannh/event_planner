<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class salleRequest extends FormRequest
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
        return [
            
            'SalleName'=>'required',
            'price'=>'required|numeric|min:0',
            'capacite'=>'required|numeric|min:0',
            'description'=>'required|min:3|max:1000',
            'images'=>'required',
        ];
    }
}

