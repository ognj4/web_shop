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
Route::get('/admin/all-products', [ProductsController::class,'index']);

Route::get('/admin/delete-product/{product}', [ProductsController::class,'delete']);


Route::post('/send-contact', [ContactController::class,'sendContact']);
