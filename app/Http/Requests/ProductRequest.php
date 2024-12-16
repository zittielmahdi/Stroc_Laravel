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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product_name'=>'required|string|max:30|min:2',
            'brand'=>'required|max:30|min:2',
            'serial_number'=>'required',
            'price_per_unit'=>'required',
         	'tva'=>'required',
        	'quantity'=>'required',
            'image'=>'required'
        ];
    }
    public function messages()
    {
        return [

        ];
    }
}
