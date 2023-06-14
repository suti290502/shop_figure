<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\FigureController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;


Route::get('/home/index', [HomeController::class, 'index'])->name('home.index');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('home.login');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::get('/category/index', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::get('/category/delete{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
Route::get('/category/edit{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/update{id}', [CategoryController::class, 'update'])->name('category.update');
Route::get('/category/show{id}', [CategoryController::class, 'show'])->name('category.show');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');

Route::get('/figure/index', [FigureController::class, 'index'])->name('figure.index');
Route::get('/figure/create', [FigureController::class, 'create'])->name('figure.create');
Route::get('/figure/delete{id}', [FigureController::class, 'destroy'])->name('figure.destroy');
Route::get('/figure/edit{id}', [FigureController::class, 'edit'])->name('figure.edit');
Route::post('/figure/update{id}', [FigureController::class, 'update'])->name('figure.update');
Route::get('/figure/show{id}', [FigureController::class, 'show'])->name('figure.show');
Route::post('/figure/store', [FigureController::class, 'store'])->name('figure.store');