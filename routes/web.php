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



Route::get('monthly', [ProductController::class, 'monthly']);
Route::get('total/monthly', [ProductController::class, 'monthlyTotal']);
Route::get('total/daily', [ProductController::class, 'dailylyTotal']);
Route::get('daily', [ProductController::class, 'daily']);
Route::get('create-monthly', [ProductController::class, 'createMonthly']);
Route::get('create-daily', [ProductController::class, 'createDaily']);
Route::resource('product', ProductController::class)->except('index', 'create');
