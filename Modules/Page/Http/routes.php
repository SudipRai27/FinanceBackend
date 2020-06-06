<?php

Route::group(['middleware' => ['web', 'customAuthCheck'], 'prefix' => 'page', 'namespace' => 'Modules\Page\Http\Controllers'], function()
{
	//GET ROUTES

    Route::get('page-settings', [
    	'as' => 'page-settings', 
    	'uses' => 'PageController@getPageSettings'
    	]);


    Route::get('delete-page-photo/{id}', [
    	'as' => 'delete-page-photo', 
    	'uses' => 'PageController@getDeletePagePhoto'
    	]);

    //POST ROUTES
    
    Route::post('update-page-content',[
    	'as' =>'update-page-content', 
    	'uses' => 'PageController@postUpdatePageContent'
    	]);


    //AJAX ROUTES

    Route::get('ajax-get-dynamic-content-form', [
    	'as' => 'ajax-get-dynamic-content-form', 
    	'uses' => 'PageController@getAjaxDynamicPageForm'
    	]);	
});
