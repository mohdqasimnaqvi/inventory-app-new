<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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



Route::get('product/monthly', [ProductController::class, 'monthly']);
Route::get('product/daily', [ProductController::class, 'daily']);
Route::get('product/create-monthly', [ProductController::class, 'createMonthly']);
Route::get('product/create-daily', [ProductController::class, 'createDaily']);
Route::resource('product', ProductController::class)->except('index', 'create');
