<?php

//use Illuminate\Http\Request;
use App\Http\Controllers\Frontend\UssdController;


//use Dingo\Api\Routing\Router;
$api = app('Dingo\Api\Routing\Router');



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|


Route::middleware('auth:api')->get('vehicle/test', function (Request $request) {
    return $request->test();
});*/


//Route::get('vehicle/test','UssdController@test');

$api->version('v1', function ($api) {
    $api->get('vehicle/test', 'App\Http\Controllers\Frontend\UssdController@test');
    $api->get('vehicle/cal/{id}', 'App\Http\Controllers\Frontend\UssdController@cal');
});

