<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddSettingRequest extends FormRequest
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
            'config_key' => 'bail|required|unique:settings|max:255|min:5',
            'config_value' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'config_key.required' => 'Config key is required',
            'config_key.unique' => 'Config key is unique',
            'config_key.max' => 'Config key of maxlength is 255 characters',
            'config_key.unique' => 'Config key of minlength is 5 characters',
            'config_value.required' => 'Config value is required'
        ];
    }
}
