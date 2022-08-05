<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontedController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::post('/add_to_cart',[CartController::class,'Cart']);
Route::get('/add_to_cart_delete/{id}',[CartController::class,'add_to_cart_delete']); 
Route::post('/update_cart',[CartController::class,'update_cart']);

Route::middleware(['auth'])->group(function(){
    Route::get('/show_cart',[CartController::class,'ViewCart']); 
    Route::get('/checkout',[CheckoutController::class,'checkout']);  
    Route::post('/place_order',[CheckoutController::class,'place_order']); 
    Route::get('/my_order',[UserController::class,'index']); 
    Route::get('/view_order/{id}',[UserController::class,'view_order']); 
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/',[FrontController::class ,'index']);
Route::get('/category',[FrontController::class ,'category']);
Route::get('/category_filter/{slug}',[FrontController::class ,'category_filter']);
Route::get('/category/{cate_slug}/{pro_slug}',[FrontController::class ,'categoryview']);












Route::middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard',[FrontedController::class ,'index']);
    Route::get('/Category',[CategoryController::class ,'index']);
    Route::get('/add_category',[CategoryController::class ,'addCategory']);
    Route::post('/insert_category',[CategoryController::class ,'insert_category']);
    Route::get('/editCategory/{id}',[CategoryController::class ,'editCategory']);
    Route::put('/update_category/{id}',[CategoryController::class ,'update_category']);
    Route::get('/deleteCategory/{id}',[CategoryController::class ,'deleteCategory']);
    
    

    Route::get('/add_product',[ProductController::class ,'add_product']);
    Route::get('/show_product',[ProductController::class ,'show_product']);
    Route::post('/insert_product',[ProductController::class ,'insert_product']);
    Route::get('/editProduct/{id}',[ProductController::class ,'editProduct']);
    Route::get('/deleteProduct/{id}',[ProductController::class ,'deleteProduct']);
    Route::put('/update_product/{id}',[ProductController::class ,'update_product']);
});