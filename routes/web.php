<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PhnemailController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SittingController;
use App\Http\Controllers\SocialmediaController;
use App\Http\Controllers\SubscriptionsController;
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
            Route::get('/services/state/{id}',[ServicesController::class,'change_state']);
            Route::post('/services/create',[ServicesController::class,'store']);
            Route::post('/services/edit',[ServicesController::class,'update']);
            Route::post('/services/delete',[ServicesController::class,'destroy']);

            Route::get('/sections',[SectionsController::class,'index']);
            Route::get('/sections/state/{id}',[SectionsController::class,'change_state']);
            Route::post('/sections/create',[SectionsController::class,'store']);
            Route::post('/sections/edit',[SectionsController::class,'update']);
            Route::post('/sections/delete',[SectionsController::class,'destroy']);

            Route::get('/blogs',[BlogsController::class,'index']);
            Route::get('/blogs/state/{id}',[BlogsController::class,'change_state']);
            Route::post('/blogs/create',[BlogsController::class,'store']);
            Route::post('/blogs/edit',[BlogsController::class,'update']);
            Route::post('/blogs/delete',[BlogsController::class,'destroy']);

            Route::get('/products',[ProductsController::class,'index']);
            Route::get('/products/state/{id}',[ProductsController::class,'change_state']);
            Route::post('/products/create',[ProductsController::class,'store']);
            Route::post('/products/edit',[ProductsController::class,'update']);
            Route::post('/products/delete',[ProductsController::class,'destroy']);


            Route::get('/subscriptions',[SubscriptionsController::class,'index']);
            Route::get('/subscriptions/state/{id}',[SubscriptionsController::class,'change_state']);
            Route::post('/subscriptions/delete',[SubscriptionsController::class,'destroy']);


            Route::get('/company',[CompanyController::class,'index']);
            Route::post('/company/edit',[CompanyController::class,'update']);

            Route::get('/phonemail',[PhnemailController::class,'index']);
            Route::post('/phonemail/edit',[PhnemailController::class,'update']);
            Route::get('/phonemail/state/{id}',[PhnemailController::class,'change_state']);



            Route::get('/socialmedia',[SocialmediaController::class,'index']);
            Route::post('/socialmedia/edit',[SocialmediaController::class,'update']);
            Route::get('/socialmedia/state/{id}',[SocialmediaController::class,'change_state']);


            Route::get('/sittings',[SittingController::class,'index']);
            Route::get('/sittings/site/{val}',[SittingController::class,'change_site']);
            Route::get('/sittings/commint/{val}',[SittingController::class,'change_commint']);
            Route::get('/sittings/email/{val}',[SittingController::class,'change_email']);



        });
    }
);
