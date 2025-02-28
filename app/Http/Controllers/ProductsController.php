<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;

class ProductsController extends Controller
{
    public function index()
    {
        $allProducts = ProductsModel::all();
        return view('allProducts',compact('allProducts'));
    }
}
