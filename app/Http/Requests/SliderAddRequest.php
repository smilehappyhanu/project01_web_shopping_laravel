<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderAddRequest extends FormRequest
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
            'slider_name' => 'bail|required|max:255|min:5',
            'slider_description' => 'required',
            'slider_image_path' => 'required',
        ];
    }
        public function messages()
    {
        return [
            'slider_name.required' => 'Slider name is required',
            'slider_name.max'  => ' Slider name of maxlength is 255 characters',
            'slider_name.min'  => ' Slider name of minlength is 5 characters',
            'slider_description.required' => 'Slider description is required',
            'slider_image_path.required' => 'Slider image is required',
        ];
    }
}
