<?php

Route::group(['middleware' => ['web','customAuthCheck'], 'prefix' => 'documents', 'namespace' => 'Modules\Documents\Http\Controllers'], function()
{
	//GET ROUTES

    Route::get('list-documents', [
    	'as' => 'list-documents', 
    	'uses' => 'DocumentsController@getListDocuments'
    	]);

    Route::get('create-documents', [
    	'as' => 'create-documents', 
    	'uses' => 'DocumentsController@getCreateDocuments'
    	]);

    Route::get('download-document-file/{id}', [
    	'as' => 'download-document-file', 
    	'uses' => 'DocumentsController@downloadFilesDocuments'
    	]);

    //POST ROUTES

    Route::post('documents-create-post', [
    	'as' => 'documents-create-post', 
    	'uses' => 'DocumentsController@postCreateDocuments'
    	]);

    Route::post('documents-delete/{id}', [
    	'as' => 'documents-delete', 
    	'uses' => 'DocumentsController@postDelete'
    	]);
});
