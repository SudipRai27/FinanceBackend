<?php

Route::group(['middleware' => ['web', 'customAuthCheck'], 'prefix' => 'emi', 'namespace' => 'Modules\EMI\Http\Controllers'], function()
{
    Route::get('calculate-emi', [
    	'as' => 'calculate-emi', 
    	'uses' => 'EMIController@getCalculateEMI'
    	]);
});
