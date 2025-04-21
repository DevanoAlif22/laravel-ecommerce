<?php

use App\Http\Controllers\FrontController;
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

Route::get('/', [FrontController::class, 'home'])->name('home');
Route::get('/products', [FrontController::class, 'index'])->name('products');
Route::get('/detailProduct', [FrontController::class, 'detailProduct'])->name('detailProduct');
Route::get('/baskets', [FrontController::class, 'baskets'])->name('baskets');
Route::get('/login', [FrontController::class, 'login'])->name('auth.login');
Route::get('/register', [FrontController::class, 'register'])->name('auth.register');
Route::get('/detailUser', [FrontController::class, 'detailUser'])->name('detailUser');
Route::get('/invoice', [FrontController::class, 'invoice'])->name('invoice');