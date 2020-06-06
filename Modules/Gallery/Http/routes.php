<?php

Route::group(['middleware' => ['web' , 'customAuthCheck'], 'prefix' => 'gallery', 'namespace' => 'Modules\Gallery\Http\Controllers'], function()
{
    ///GET ROUTES

	Route::get('list-gallery',  [
		'as' => 'list-gallery', 
		'uses' => 'GalleryController@getList'

		]);


	Route::get('create-gallery', [
		'as' => 'create-gallery', 
		'uses' => 'GalleryController@getCreate'
		]);	


	Route::get('delete-photos/{id}', [
		'as' => 'delete-photos', 
		'uses' => 'GalleryController@getDeletePhotos'
		]);

	///POST ROUTES


	Route::post('gallery-photo-upload', [
		'as' => 'gallery-photo-upload', 
		'uses' => 'GalleryController@postUpload'
		]);



});
