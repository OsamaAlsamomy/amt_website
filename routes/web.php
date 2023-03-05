<?php

use App\Http\Controllers\BlogsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\UsersController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

Auth::routes();




Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ],
    function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        Route::group(['prefix' => 'admin'],function(){

            Route::get('/users',[UsersController::class,'index']);
            Route::get('/users/state/{id}',[UsersController::class,'change_state']);
            Route::post('/users/create',[UsersController::class,'store']);
            Route::post('/users/edit',[UsersController::class,'update']);
            Route::post('/users/delete',[UsersController::class,'destroy']);

            Route::get('/services',[ServicesController::class,'index']);
            Route::post('/services/state',[ServicesController::class,'change_state']);
            Route::post('/services/create',[ServicesController::class,'store']);
            Route::post('/services/edit',[ServicesController::class,'update']);
            Route::post('/services/delete',[ServicesController::class,'destroy']);

            Route::get('/sections',[SectionsController::class,'index']);
            Route::post('/sections/state',[SectionsController::class,'change_state']);
            Route::post('/sections/create',[SectionsController::class,'store']);
            Route::post('/sections/edit',[SectionsController::class,'update']);
            Route::post('/sections/delete',[SectionsController::class,'destroy']);

            Route::get('/blogs',[BlogsController::class,'index']);
            Route::post('/blogs/state',[BlogsController::class,'change_state']);
            Route::post('/blogs/create',[BlogsController::class,'store']);
            Route::post('/blogs/edit',[BlogsController::class,'update']);
            Route::post('/blogs/delete',[BlogsController::class,'destroy']);


        });
    }
);
