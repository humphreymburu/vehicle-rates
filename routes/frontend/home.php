<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\User\AccountController;
use App\Http\Controllers\Frontend\User\ProfileController;
use App\Http\Controllers\Frontend\User\DashboardController;
use App\Http\Controllers\Frontend\VehicleController;
use App\Http\Controllers\Frontend\CostsController;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::post('contact/send', [ContactController::class, 'send'])->name('contact.send');
Route::get('vehicle', [VehicleController::class, 'index'])->name('vehicle');
Route::post('vehicle/post', [VehicleController::class, 'post'])->name('vehicle.post'); 
Route::post('vehicle/costs', [CostsController::class, 'costs'])->name('vehicle.costs');
Route::post('vehicle/show', [VehicleController::class, 'show'])->name('vehicle.show'); 

//Route::get('vehicle/getcost/{id}', [VehicleController::class, 'getcosts'])->name('vehicle.getcosts');

Route::get('vehicle/getcosts/{id}','VehicleController@getCosts');
Route::get('vehicle/getcategories','VehicleController@getCategories');
Route::get('vehicle/getsubs/{id}','VehicleController@getSubs');
Route::get('vehicle/getoils/{id}','VehicleController@getOils');
Route::get('vehicle/getdrives/{id}','VehicleController@getDrives');
Route::get('vehicle/getservices/{id}','VehicleController@getServices');
Route::get('vehicle/getrepairs/{id}','VehicleController@getRepairs');
Route::get('vehicle/gettyres/{id}','VehicleController@getTyres');
Route::get('vehicle/getfuel/{id}','VehicleController@getFuels');


/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the password is expired
 */
Route::group(['middleware' => ['auth', 'password_expires']], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        // User Dashboard Specific
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // User Account Specific
        Route::get('account', [AccountController::class, 'index'])->name('account');

        // User Profile Specific
        Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    });
});
