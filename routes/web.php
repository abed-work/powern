<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LiraController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\{SettingController,CurrencyController};
use App\Models\Category;

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

Route::get('/',[PagesController::class,'index'])->name('home');

Route::get('shop', [ProductController::class,'index'])->name('shop');

Route::get('about-us', function () {
    return view('pages.about-us');
})->name('about-us');

Route::get('contact-us', function () {
    return view('pages.contact');
})->name('contact-us');

Route::get('/login', [AuthController::class,'index'])->name('login');
Route::post('/login', [AuthController::class,'authenticate']);

Route::get('/logout',[AuthController::class,'logout'])->name('logout');
Route::post('/logout', [AuthController::class,'logout']);

Route::get('/product/{id}', [ProductController::class,'show'])->name('product.show');

/* Admin Routes */

Route::middleware(['auth'])->prefix('dashboard')->name('dashboard.')->group(function () {

    Route::get('/', [DashboardController::class,'index'])->name('home');

    Route::get('/categories', [DashboardController::class,'category'])->name('categories');
    Route::post('/categories', [CategoryController::class,'store'])->name('category.store');
    Route::get('/categories/{id}/edit', [CategoryController::class,'edit'])->name('category.edit');
    Route::put('/categories/{id}', [CategoryController::class,'update'])->name('category.update');
    Route::delete('/categories/{id}', [CategoryController::class,'destroy'])->name('category.delete');

    Route::get('/products', [DashboardController::class,'product'])->name('products');
    Route::post('/products',[ProductController::class,'store'])->name('product.store');
    Route::get('/products/{id}/edit', [ProductController::class,'edit'])->name('product.edit');
    Route::put('/products/{id}', [ProductController::class,'update'])->name('product.update');
    Route::delete('/products/{id}', [ProductController::class,'destroy'])->name('product.delete');

    Route::get('/setting', [DashboardController::class,'setting'])->name('setting');
    Route::post('/setting/edit', [SettingController::class,'update'])->name('setting.update');

    Route::resource('/currency', CurrencyController::class);

});
