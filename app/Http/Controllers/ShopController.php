<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $products = [
            'Samsung S24', 'Samsung S25+', 'Samsung A14', 'Samsung Z Flip 5'
        ];
        return view ('shop', compact('products'));
    }
}
