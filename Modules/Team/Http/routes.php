<?php

Route::group(['middleware' => ['web', 'customAuthCheck'], 'prefix' => 'team', 'namespace' => 'Modules\Team\Http\Controllers'], function()
{
 	//GET ROUTES

	Route::get('list-team', [
		'as' => 'list-team', 
		'uses' => 'TeamController@getListTeam'
		]);

	Route::get('create-team', [
		'as' => 'create-team', 
		'uses' => 'TeamController@getCreateTeam'
		]);

	Route::get('edit-team/{id}', [
		'as' => 'edit-team', 
		'uses' => 'TeamController@getEditTeam'
		]);

	Route::get('delete-team/{id}', [
		'as' => 'delete-team', 
		'uses' => 'TeamController@getDeleteTeam'
		]);

	Route::get('view-team/{id}', [
		'as' => 'view-team', 
		'uses' => 'TeamController@getViewTeam'
		]);

 	//POST ROUTES   

 	Route::post('team-create-post', [
 		'as' => 'team-create-post', 
 		'uses' => 'TeamController@postCreateTeam'
 		]);

 	Route::post('team-edit-post/{id}', [
 		'as' => 'team-edit-post', 
 		'uses' => 'TeamController@postEditTeam'
 		]);
});
