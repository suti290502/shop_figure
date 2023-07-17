<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Blueprint;
use Illuminate\Support\Facades\Scheme;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\FigureController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\SignupController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'index'], function(){
    Route::get('/',[BackendController::class,'index'])->name('admin.all.index');
});

Route::group(['prefix'=>'category'], function(){
    Route::get('/',[CategoryController::class,'Categoryindex'])->name('admin.category.index');
    Route::get('add/',[CategoryController::class,'getAddCategory']);
    Route::post('add/',[CategoryController::class,'postAddCategory'])->name('admin.category.add');
    Route::get('edit/{id}',[CategoryController::class,'getEditCategory']);
    Route::post('edit/{id}',[CategoryController::class,'postEditCategory'])->name('admin.category.edit');
    Route::get('delete/{id}',[CategoryController::class,'deleteCategory']);
});

Route::group(['prefix'=>'figure'], function(){
    Route::get('/',[FigureController::class,'Figureindex'])->name('admin.figure.index');
    Route::get('add/',[FigureController::class,'getAddFigure']);
    Route::post('add/',[FigureController::class,'postAddFigure'])->name('admin.figure.add');
    Route::get('edit/{id}',[FigureController::class,'getEditFigure']);
    Route::post('edit/{id}',[FigureController::class,'postEditFigure'])->name('admin.figure.edit');
    Route::get('delete/{id}',[FigureController::class,'deleteFigure']);
   
});

Route::group(['prefix'=>'user'], function(){
    Route::get('/',[UserController::class,'Usersindex'])->name('admin.user.index');
    Route::get('edit/{id}',[UserController::class,'getEditUsers'])->name('admin.user.edit');
    Route::post('edit/{id}',[userController::class,'postEditUsers']);
    Route::get('delete/{id}',[UserController::class,'deleteUsers']);
});

Route::group(['prefix'=>'homepage'], function(){
    Route::get('/',[HomepageController::class,'homepage'])->name('client.page.index');
});
Route::group(['prefix'=>'home'], function(){
    Route::get('/',[HomepageController::class,'home'])->name('customer.page.index');
});

Route::group(['prefix'=>'signin'], function(){
    Route::get('/',[SigninController::class,'getSignin'])->name('client.page.signin');
    Route::post('/',[SigninController::class,'postSignin']);
});

Route::group(['prefix'=>'signup'], function(){
    Route::get('/',[SignupController::class,'getSignup'])->name('client.page.signup');
    Route::post('/',[SignupController::class,'postSignup']);
});

Route::group(['prefix'=>'logout'], function(){
    Route::get('/',[LogoutController::class,'Logout'])->name('both.page.logout');
});
Route::group(['prefix'=>'tvshows'], function(){
    Route::get('/',[TvshowsController::class,'tvshows'])->name('client.page.tvshows');
});

Route::group(['prefix'=>'figures'], function(){
    Route::get('/',[FigureController::class,'figures'])->name('client.page.figure');
    Route::get('/search', [FigureController::class, 'search'])->name('search');
});


Route::get('/figure/index', [FigureController::class, 'index'])->name('figure.index');
Route::get('/figure/create', [FigureController::class, 'create'])->name('figure.create');
Route::get('/figure/delete{id}', [FigureController::class, 'destroy'])->name('figure.destroy');
Route::get('/figure/edit{id}', [FigureController::class, 'edit'])->name('figure.edit');
Route::post('/figure/update{id}', [FigureController::class, 'update'])->name('figure.update');
Route::get('/figure/show{id}', [FigureController::class, 'show'])->name('figure.show');
Route::post('/figure/store', [FigureController::class, 'store'])->name('figure.store');;


Route::group(['prefix'=>'new'], function(){
    Route::get('/',[NewController::class,'new'])->name('client.page.new');
});

// cart
Route::get('cart', [CartController::class, 'cart'])->name('customer.page.cart');
Route::get('add-to-cart/{cart_id}', [CartController::class, 'addToCart'])->name('add_to_cart');
Route::patch('update-cart', [CartController::class, 'update'])->name('update_cart');
Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove_from_cart');