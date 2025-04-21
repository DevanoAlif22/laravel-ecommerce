<?php

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CmsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;
use App\Models\Transaction;

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
Route::get('/login', [FrontController::class, 'login'])->name('auth.login');
Route::get('/register', [FrontController::class, 'register'])->name('auth.register');
Route::get('/detailUser', [FrontController::class, 'detailUser'])->name('detailUser');
Route::get('/products/{id}', [FrontController::class, 'productCategory']);
Route::post('/products/by/search', [FrontController::class, 'searchProduct']);

Route::get('/product/detail/{id}', [FrontController::class, 'detailProduct'])->name('detailProduct');
Route::get('/cart', [FrontController::class, 'cart'])->name('cart');

// cms admin
Route::middleware('guest')->group(function () {
    Route::get('/login', [FrontController::class, 'login'])->name('auth.login');
    Route::post('/login', [AuthController::class, 'loginUser']);
    Route::get('/register', [FrontController::class, 'register'])->name('auth.register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/admin/login', [AuthController::class, 'index'])->name('admin.login');
    Route::post('/admin/login', [AuthController::class, 'loginAdmin']);
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logoutUser']);
    Route::post('/product/add/cart', [TransactionController::class, 'addCart'])->name('login');
    Route::get('/cart/delete/{id}', [TransactionController::class, 'deleteCart']);
    Route::post('/checkout', [TransactionController::class, 'checkout'])->name('checkout');
    Route::get('/invoice/{id}', [TransactionController::class, 'invoice'])->name('invoice');
    Route::get('/payment-success/{id}', [TransactionController::class, 'success'])->name('checkout-success');
    Route::get('/invoice/print/{id}', [TransactionController::class, 'print'])->name('invoice.print');
    Route::get('/invoice/cancel/{id}', [TransactionController::class, 'cancelInvoice']);
});

Route::middleware(['auth', 'admin'])->group(function () {
    // Route Resource untuk ProductController
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/invoice/cancel/{id}', [TransactionController::class, 'cancelInvoiceAdmin']);
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    });

    Route::get('/admin/dashboard', [CmsController::class, 'dashboard'])->name('dashboard');

    // Route Resource untuk CategoryController
    Route::prefix('admin/category')->name('admin.category.')->group(function () {
        Route::get('', [CategoryController::class, 'index'])->name('index');
        Route::get('/add', [CategoryController::class, 'create'])->name('create');
        Route::post('/add', [CategoryController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::post('/edit/{id}', [CategoryController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->name('destroy');
    });
    Route::prefix('admin/product')->name('admin.product.')->group(function () {
        Route::get('', [ProductController::class, 'index'])->name('index');
        Route::get('/add', [ProductController::class, 'create'])->name('create');
        Route::post('/add', [ProductController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::post('/edit/{id}', [ProductController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('delete');
    });
    Route::prefix('admin/user')->name('admin.user.')->group(function () {
        Route::get('', [UserController::class, 'index'])->name('index');
    });
    Route::prefix('admin/transaction')->name('admin.transaction.')->group(function () {
        Route::get('', [TransactionController::class, 'index'])->name('index');
    });
});
