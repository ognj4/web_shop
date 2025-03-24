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
Route::get('/contact', [ContactController::class, 'index']);

Route::middleware(['auth', AdminCheckMiddleware::class])->prefix('admin')->group(function () {

    Route::view('/add-product', 'addProduct');

    Route::controller(ContactController::class)->prefix('/contact')->group(function () {
        Route::get('/all', 'getAllContacts');
        Route::post('/send','sendContact')->name('sendContact');
        Route::get('/delete/{contact}','delete')->name('obrisiKontakt');
    });

    Route::controller(ProductsController::class)->group(function (){
        Route::get('/all-products', 'index')->name('sviProizvodi');
        Route::get('/delete-product/{product}', 'delete')->name('obrisiProizvod');
        Route::post('/save-product', 'saveProduct')->name('snimanjeOglasa');
        Route::get('/product/edit/{product}','singleProduct')->name('product.single');
        Route::post('/product/save/{product}','edit')->name('product.save');
    });

});


require __DIR__.'/auth.php';
