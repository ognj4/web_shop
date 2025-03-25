<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ShopController;
use App\Http\Middleware\AdminCheckMiddleware;
use Illuminate\Support\Facades\Route;


Route::view('/about','about');
Route::get('/',[HomepageController::class,'index']);
Route::get('/shop',[ShopController::class,'index']);
Route::get('products/{product}', [ProductsController::class, 'permalink'])->name('products.permalink');

Route::get('/contact', [ContactController::class, 'index']);

Route::middleware(['auth', AdminCheckMiddleware::class])->prefix('admin')->group(function () {

    Route::view('/add-product', 'addProduct');

    Route::controller(ContactController::class)->prefix('/contact')->group(function () {
        Route::get('/all', 'getAllContacts');
        Route::get('/delete/{contact}','delete')->name('contact.delete');
        Route::post('/send','sendContact')->name('contact.send');
    });

    Route::controller(ProductsController::class)->prefix('/products')->name('products.')->group(function (){
        Route::get('/all', 'index')->name('all');
        Route::get('/delete/{product}', 'delete')->name('delete');
        Route::get('/edit/{product}','singleProduct')->name('single');
        Route::post('save/{product}','edit')->name('save');
        Route::post('/save', 'saveProduct')->name('create');
    });

});


require __DIR__.'/auth.php';
