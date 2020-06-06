<?php

namespace Modules\News\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;

class NewsRequest extends FormRequest
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

        if($route_name == 'news-create-post')
        {
            $rules = [
                        'title' => ['required'],
                        'content' => ['required'],
                        'photo' => ['required'],
                              
                     ];

        }

        if($route_name == 'news-edit-post')
        {
            $rules = [
                        'title' => ['required'],
                        'content' => ['required'],
                                                      
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
