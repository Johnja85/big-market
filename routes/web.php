<?php

use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Product\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

DB::listen(function($query){
    var_dump($query->sql);
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true ]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth', 'verified']);

Route::resource('customer', CustomerController::class);

Route::resource('product', ProductController::class);

Route::get('category/{category}', [CategoryController::class, 'show'])->name('category.show');

// Auth::routes(['verify' => true ]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
