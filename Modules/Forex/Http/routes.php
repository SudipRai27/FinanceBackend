<?php

Route::group(['middleware' => ['web', 'customAuthCheck'], 'prefix' => 'forex', 'namespace' => 'Modules\Forex\Http\Controllers'], function()
{

	///GET ROUTES

    Route::get('create-forex', [
    	'as' => 'create-forex', 
    	'uses' => 'ForexController@getCreateForex'
    	]);

    Route::get('list-forex', [
    	'as' => 'list-forex', 
    	'uses' => 'ForexController@getListForex'

    	]);

    Route::get('edit-forex/{id}', [
    	'as' => 'edit-forex', 
    	'uses' => 'ForexController@getEditForex'
    	]);


    ///POST ROUTES

    Route::post('create-forex-post', [
    	'as' => 'create-forex-post', 
    	'uses' => 'ForexController@postCreateForex'
    	]);

    Route::post('forex-edit-post/{id}', [
    	'as' => 'forex-edit-post', 
    	'uses' => 'ForexController@postEditForex'
    	]);


    Route::post('forex-delete/{id}', [
    	'as' => 'forex-delete', 
    	'uses' => 'ForexController@postDeleteForex'
    	]);

});
