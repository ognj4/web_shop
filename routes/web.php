<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::view('/','welcome');
Route::view('/shop','shop');
Route::view('/about','about');
Route::view('contact', 'contact');
