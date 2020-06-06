<?php

namespace Modules\Slider\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;

class SliderRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [];

        $route_name = \Request::route()->getName();

        if($route_name == 'slider-create-post')
        {
            $rules = [
                        'title' => ['required'],
                        'order_index' => ['required','integer','unique:slider,order_index'],
                        'photo' => ['required'],
                              
                     ];

        }

        if($route_name == 'slider-edit-post')
        {
            $rules = [
                        'title' => ['required'],
                        'order_index' => ['required','integer']
                                                      
                     ];

        }
        
        return $rules;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    

   
}
