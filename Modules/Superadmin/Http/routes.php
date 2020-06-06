<?php

Route::group(['middleware' => 'web', 'prefix' => 'superadmin', 'namespace' => 'Modules\Superadmin\Http\Controllers'], function()
{

	/// GET REQUEST

    Route::get('/home', [
    	'as' => 'superadmin-home', 
    	'uses' => 'SuperadminController@getDashboard'
    	])->middleware('customAuthCheck');

    Route::get('/create', [
    	'as' => 'superadmin-create', 
    	'uses' => 'SuperadminController@getCreate'
    	])->middleware('customAuthCheck');


    Route::get('/login', [
    	'as' => 'superadmin-login', 
    	'uses' => 'SuperadminController@getLogin'
    	])->middleware('restrictLogin');


    Route::get('superadmin-logout', [
    	'as' => 'superadmin-logout', 
    	'uses' => 'SuperadminController@getLogout'
    	])->middleware('customAuthCheck');

    Route::get('superadmin-change-details/{id}', [
        'as' => 'superadmin-change-details', 
        'uses' => 'SuperadminController@getChangeDetails'
        ]);


    ///POST REQUEST

    Route::post('/superadmin-create-post', [
    	'as' => 'superadmin-create-post', 
    	'uses' => 'SuperadminController@postCreate'
    	])->middleware('customAuthCheck');


    Route::post('/superadmin-login-post', [
    	'as' => 'superadmin-login-post', 
    	'uses' => 'SuperadminController@postLogin'
    	])->middleware('restrictLogin');

    Route::post('/superadmin-edit-details/{id}', [
        'as' => 'superadmin-edit-details', 
        'uses' => 'SuperadminController@postChangeDetails'
        ]);
});
