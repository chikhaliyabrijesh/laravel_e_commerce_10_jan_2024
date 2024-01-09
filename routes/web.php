<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[HomeController::class,'showProductImage'])->name('show.products');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Categories Route
    Route::get('/category', [CategoryController::class, 'index'])->name('index.category');
    Route::get('/create-category', [CategoryController::class, 'create'])->name('create.category');
    Route::post('/store-category', [CategoryController::class, 'store'])->name('store.category');
    Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->name('edit.category');
    Route::post('/update-category/{id}', [CategoryController::class, 'update'])->name('update.category');
    Route::get('/delete-category/{id}', [CategoryController::class, 'delete'])->name('delete.category');

    // Subcategories Route
    Route::get('/sub-category', [SubCategoryController::class, 'index'])->name('index.subcategory');
    Route::get('/create-subcategory', [SubCategoryController::class, 'create'])->name('create.subcategory');
    Route::post('/store-subcategory', [SubCategoryController::class, 'store'])->name('store.subcategory');
    Route::get('/edit-subcategory/{id}', [SubCategoryController::class, 'edit'])->name('edit.subcategory');
    Route::post('/update-subcategory/{id}', [SubCategoryController::class, 'update'])->name('update.subcategory');
    Route::get('/delete-subcategory/{id}', [SubCategoryController::class, 'delete'])->name('delete.subcategory');

    // product Route
    Route::get('/products', [ProductController::class, 'index'])->name('index.product');
    Route::get('/create-products', [ProductController::class, 'create'])->name('create.product');
    Route::post('/store-products', [ProductController::class, 'store'])->name('store.product');
    Route::get('/edit-products/{id}', [ProductController::class, 'edit'])->name('edit.product');
    Route::post('/update-products/{id}', [ProductController::class, 'update'])->name('update.product');
    Route::get('/delete-products/{id}', [ProductController::class, 'delete'])->name('delete.product');

    Route::get('/dashboard', [ProductController::class, 'dashboard'])->name('dashboard');



    









});

require __DIR__.'/auth.php';