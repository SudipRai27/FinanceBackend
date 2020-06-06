<?php

Route::group(['middleware' => ['web' , 'customAuthCheck'], 'prefix' => 'slider', 'namespace' => 'Modules\Slider\Http\Controllers'], function()
{
    ///GET ROUTES

    Route::get('create-slider', [
    	'as' => 'create-slider', 
    	'uses' => 'SliderController@getCreate'
    	]);

    Route::get('list-slider',[
    	'as' => 'list-slider', 
    	'uses' => 'SliderController@getList'
    	]);

    Route::get('edit-slider/{id}', [
        'as' => 'edit-slider', 
        'uses' => 'SliderController@getEditView'
        ]);


    /// POST ROUTES

    Route::post('slider-create-post', [
    	'as' => 'slider-create-post', 
    	'uses' => 'SliderController@postCreate'
    	]);

    Route::post('slider-edit-post/{id}', [
        'as' => 'slider-edit-post', 
        'uses' => 'SliderController@postEdit'
        ]);

    Route::post('slider-delete/{id}', [
        'as' => 'slider-delete', 
        'uses' => 'SliderController@postDelete'
        ]);
});
