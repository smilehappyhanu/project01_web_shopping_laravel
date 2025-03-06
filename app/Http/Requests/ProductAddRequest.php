<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
            'name' => 'bail|required|max:255|min:5',
            'price' => 'required',
            'category_id' => 'required',
            'contents' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Product name is required',
            'name.max'  => 'Product name of maxlength is 255 characters',
            'name.min'  => 'Product name of minlength is 5 characters',
            'price.required'  => 'Price is required',
            'contents.required'  => 'Description is required',
        ];
    }
}
