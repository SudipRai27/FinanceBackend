<?php

Route::group(['middleware' => ['web' , 'customAuthCheck'] , 'prefix' => 'news', 'namespace' => 'Modules\News\Http\Controllers'], function()
{
    /// GET ROUTES


    Route::get('list-news', [
    	'as' => 'list-news', 
    	'uses' => 'NewsController@getListNews'
    	]);


    Route::get('create-news', [
    	'as' => 'create-news', 
    	'uses' => 'NewsController@getCreateNews'
    	]);


    Route::get('edit-news/{id}', [
    	'as' => 'edit-news', 
    	'uses' => 'NewsController@getEditNews'
    	]);

    Route::get('view-news/{id}', [
        'as' => 'view-news', 
        'uses' => 'NewsController@getViewNews'
        ]);

    /// POST ROUTES

    Route::post('news-create-post', [
    	'as' => 'news-create-post', 
    	'uses' => 'NewsController@postCreateNews'
    	]);

    Route::post('news-edit-post/{id}', [
    	'as' => 'news-edit-post', 
    	'uses' => 'NewsController@postEditNews'
    	]);

    Route::post('news-delete/{id}', [
    	'as' => 'news-delete', 
    	'uses' => 'NewsController@postDeleteNews'
    	]);


});

