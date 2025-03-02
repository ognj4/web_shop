<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::view('/about','about');

Route::get('/',[HomepageController::class,'index']);
Route::get('/shop',[ShopController::class,'index']);

Route::get('/contact', [ContactController::class, 'index']);

Route::get('/admin/all-contacts', [ContactController::class,'getAllContacts']);
Route::get('/admin/all-products', [ProductsController::class,'index'])
    ->name('sviProizvodi');

Route::get('/admin/delete-product/{product}', [ProductsController::class,'delete'])
    ->name('obrisiProizvod');
Route::get('/admin/delete-contact/{contact}', [ContactController::class, "delete"])
    ->name('obrisiKontakt');

Route::view('/admin/add-product', 'addProduct');
Route::post('/admin/save-product',[ProductsController::class, 'saveProduct'])
    ->name('snimanjeOglasa');

Route::post('/send-contact', [ContactController::class,'sendContact']);

Route::get('admin/product/edit/{product}',[ProductsController::class,'singleProduct'])
    ->name('product.single');

Route::post('admin/product/save/{product}',[ProductsController::class,'edit'])
    ->name('product.save');
