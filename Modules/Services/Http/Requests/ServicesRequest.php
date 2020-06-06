<?php

namespace Modules\Services\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;

class ServicesRequest extends FormRequest
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

        if($route_name == 'services-create-post')
        {
            $rules = [
                        'title' => ['required'],
                        'description' => ['required'],
                        'class' => ['required'],
                              
                     ];

        }

        if($route_name == 'services-edit-post')
        {
            $rules = [
                        'title' => ['required'],
                        'description' => ['required'],
                        'class' => ['required'],
                                                      
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
