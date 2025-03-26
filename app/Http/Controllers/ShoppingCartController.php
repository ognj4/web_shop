<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use App\Models\ProductsModel;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends Controller
{
    public function index()
    {
        return view('cart', [
            'cart' => Session::get('product')
        ]);
    }
    public function addToCart(CartAddRequest $request)
    {
        $product = ProductsModel::where(['id'=> $request->id])->first();

        if ($product->amount < $request->amount){
            return redirect()->back();
        }

        Session::push('product',[
            'product_id' => $request->id,
            'amount' => $request->amount,
        ]);
        return redirect()->route('cart.all');
    }
}
