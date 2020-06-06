<?php

Route::group(['middleware' => ['web' , 'customAuthCheck'], 'prefix' => 'services', 'namespace' => 'Modules\Services\Http\Controllers'], function()
{
    /// GET ROUTES
Route::get('create-services', [
    	'as' => 'create-services', 
    	'uses' => 'ServicesController@getCreate'
    	]);

    Route::get('list-services',[
    	'as' => 'list-services', 
    	'uses' => 'ServicesController@getList'
    	]);

    Route::get('edit-services/{id}', [
        'as' => 'edit-services', 
        'uses' => 'ServicesController@getEditView'
        ]);

    Route::get('delete-service-photo/{id}', [
        'as' => 'delete-service-photo', 
        'uses' => 'ServicesController@getDeleteServiceImage'
        ]);

//post routes

    Route::post('services-create-post', [
    	'as' => 'services-create-post', 
    	'uses' => 'ServicesController@postCreate'
    	]);

    Route::post('services-edit-post/{id}', [
        'as' => 'services-edit-post', 
        'uses' => 'ServicesController@postEdit'
        ]);

     Route::post('services-delete/{id}', [
        'as' => 'services-delete', 
        'uses' => 'ServicesController@destroy'
        ]);


});


