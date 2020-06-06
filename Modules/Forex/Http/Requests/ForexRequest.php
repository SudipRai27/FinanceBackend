<?php

namespace Modules\Forex\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;

class ForexRequest extends FormRequest
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

        if($route_name == 'forex-edit-post')
        {
            $rules = [
                        'currency' => ['required'],
                        'unit' => ['required'],
                        'buying' => ['required'],
                        'selling' => ['required'],
                              
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
