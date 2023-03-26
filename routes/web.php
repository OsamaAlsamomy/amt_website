<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SittingController;
use App\Http\Controllers\PhnemailController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\InterfaceController;
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



Route::get('/', [App\Http\Controllers\FrontEnd\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\FrontEnd\HomeController::class, 'about_us']);
Route::get('/contact', [App\Http\Controllers\FrontEnd\HomeController::class, 'contact_us']);
Route::post('/subscription', [App\Http\Controllers\FrontEnd\HomeController::class, 'subscrip']);
Route::post('/send/message', [App\Http\Controllers\FrontEnd\HomeController::class, 'message']);
Route::get('/products', [App\Http\Controllers\FrontEnd\HomeController::class, 'products']);
Route::get('/sections/section/{id}', [App\Http\Controllers\FrontEnd\HomeController::class, 'section']);
Route::get('/products/product/{id}', [App\Http\Controllers\FrontEnd\HomeController::class, 'product']);
Route::get('/products/serch/', [App\Http\Controllers\FrontEnd\HomeController::class, 'products_serch']);
Route::get('/blogs', [App\Http\Controllers\FrontEnd\HomeController::class, 'blogs']);
Route::get('/blogs/blog/{id}', [App\Http\Controllers\FrontEnd\HomeController::class, 'blog']);
Route::get('/blogs/search', [App\Http\Controllers\FrontEnd\HomeController::class, 'blogs_serch']);
Route::post('/send/comment', [App\Http\Controllers\FrontEnd\HomeController::class, 'comment']);
Route::get('/services', [App\Http\Controllers\FrontEnd\HomeController::class, 'services']);
Route::get('/services/service/{id}', [App\Http\Controllers\FrontEnd\HomeController::class, 'service']);





  Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Auth::routes([
            'register' => false, // Registration Routes...
            'reset' => false, // Password Reset Routes...
            'verify' => false, // Email Verification Routes...
          ]);
    });

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ],
    function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        Route::group(['prefix' => 'admin'], function () {



            Route::get('/services', [ServicesController::class, 'index']);
            Route::get('/services/state/{id}', [ServicesController::class, 'change_state']);
            Route::post('/services/create', [ServicesController::class, 'store']);
            Route::post('/services/edit', [ServicesController::class, 'update']);
            Route::post('/services/delete', [ServicesController::class, 'destroy']);

            Route::get('/sections', [SectionsController::class, 'index']);
            Route::get('/sections/state/{id}', [SectionsController::class, 'change_state']);
            Route::post('/sections/create', [SectionsController::class, 'store']);
            Route::post('/sections/edit', [SectionsController::class, 'update']);
            Route::post('/sections/delete', [SectionsController::class, 'destroy']);

            Route::get('/brands', [BrandsController::class, 'index']);
            Route::get('/brands/state/{id}', [BrandsController::class, 'change_state']);
            Route::post('/brands/create', [BrandsController::class, 'store']);
            Route::post('/brands/edit', [BrandsController::class, 'update']);
            Route::post('/brands/delete', [BrandsController::class, 'destroy']);

            Route::get('/reviews', [ReviewController::class, 'index']);
            Route::get('/reviews/state/{id}', [ReviewController::class, 'change_state']);
            Route::post('/reviews/create', [ReviewController::class, 'store']);
            Route::post('/reviews/edit', [ReviewController::class, 'update']);
            Route::post('/reviews/delete', [ReviewController::class, 'destroy']);

            Route::get('/blogs', [BlogsController::class, 'index']);
            Route::get('/blogs/state/{id}', [BlogsController::class, 'change_state']);
            Route::post('/blogs/create', [BlogsController::class, 'store']);
            Route::post('/blogs/edit', [BlogsController::class, 'update']);
            Route::post('/blogs/delete', [BlogsController::class, 'destroy']);

            Route::get('/products', [ProductsController::class, 'index']);
            Route::get('/products/state/{id}', [ProductsController::class, 'change_state']);
            Route::get('/products/top/{id}', [ProductsController::class, 'change_top']);
            Route::post('/products/create', [ProductsController::class, 'store']);
            Route::post('/products/edit', [ProductsController::class, 'update']);
            Route::post('/products/delete', [ProductsController::class, 'destroy']);


            Route::get('/subscriptions', [SubscriptionsController::class, 'index']);
            Route::get('/subscriptions/state/{id}', [SubscriptionsController::class, 'change_state']);
            Route::post('/subscriptions/delete', [SubscriptionsController::class, 'destroy']);

            Route::get('/message', [MessageController::class, 'index']);
            Route::get('/message/read/{id}', [MessageController::class, 'show']);
            Route::post('/message/delete', [MessageController::class, 'destroy']);




           // if (Auth::user()->type == 'A' || Auth::user()->type == 'S') {
                Route::get('/company', [CompanyController::class, 'index']);
                Route::post('/company/edit', [CompanyController::class, 'update']);

                Route::get('/phonemail', [PhnemailController::class, 'index']);
                Route::post('/phonemail/edit', [PhnemailController::class, 'update']);
                Route::get('/phonemail/state/{id}', [PhnemailController::class, 'change_state']);



                Route::get('/socialmedia', [SocialmediaController::class, 'index']);
                Route::post('/socialmedia/edit', [SocialmediaController::class, 'update']);
                Route::get('/socialmedia/state/{id}', [SocialmediaController::class, 'change_state']);


                Route::get('/sittings', [SittingController::class, 'index']);
                Route::get('/sittings/site/{val}', [SittingController::class, 'change_site']);
                Route::get('/sittings/commint/{val}', [SittingController::class, 'change_commint']);
                Route::get('/sittings/lang/{val}', [SittingController::class, 'change_lang']);
                Route::post('/sittings/email', [SittingController::class, 'change_email']);
                Route::post('/sittings/phone', [SittingController::class, 'change_phpne']);

                Route::get('/interfaces', [InterfaceController::class, 'index']);
                Route::get('/slid/state/{id}', [InterfaceController::class, 'change_state']);
                Route::post('/slid/create', [InterfaceController::class, 'store']);
                Route::post('/slid/edit', [InterfaceController::class, 'update']);
                Route::post('/slid/delete', [InterfaceController::class, 'destroy']);
                Route::post('/slid/adds', [InterfaceController::class, 'update_adds']);
            // }

            // if (Auth::user()->type == 'S'){
                Route::get('/users', [UsersController::class, 'index']);
                Route::get('/users/state/{id}', [UsersController::class, 'change_state']);
                Route::post('/users/create', [UsersController::class, 'store']);
                Route::post('/users/edit', [UsersController::class, 'update']);
                Route::post('/users/delete', [UsersController::class, 'destroy']);
                Route::post('/users/password', [UsersController::class, 'change_password']);

        //    }



        });
    }
);
