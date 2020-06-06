<?php

Route::group(['middleware' => ['web', 'customAuthCheck'], 'prefix' => 'testimonial', 'namespace' => 'Modules\Testimonial\Http\Controllers'], function()
{
    ///GET ROUTES

	Route::get('list-testimonial', [
		'as' => 'list-testimonial', 
		'uses' => 'TestimonialController@getListTestimonial'
		]);


	Route::get('create-testimonial', [
		'as' => 'create-testimonial', 
		'uses' => 'TestimonialController@getCreate'
		]);

	Route::get('edit-testimonial/{id}', [
		'as' => 'edit-testimonial', 
		'uses' => 'TestimonialController@getEditTestimonial'
		]);

    Route::get('view-testimonial/{id}', [
        'as' => 'view-testimonial', 
        'uses' => 'TestimonialController@getViewTestimonial'
        ]);

    ///POST ROUTES


    Route::post('testimonial-create-post', [
    	'as' => 'testimonial-create-post', 
    	'uses' => 'TestimonialController@postCreateTestimonial'
    	]);

    Route::post('testimonial-delete/{id}', [
    	'as' => 'testimonial-delete', 
    	'uses' => 'TestimonialController@postDeleteTestimonial'
    	]);

    Route::post('testimonial-edit-post/{id}', [
    	'as' => 'testimonial-edit-post', 
    	'uses' => 'TestimonialController@postEditTestimonial'
    	]);

});
