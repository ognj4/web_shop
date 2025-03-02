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
    public function delete($product)
    {
        $singleProduct = ProductsModel::where(['id' => $product])->first();
        if ($singleProduct == null) {
            die("Ovaj proizvod ne postoji!");
        }
        $singleProduct->delete();
        return redirect()->back();
    }
}
