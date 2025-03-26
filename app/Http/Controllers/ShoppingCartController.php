<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use App\Models\ProductsModel;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends Controller
{
    public function index()
    {
        // cuvamo celu korpu
        $cartItems = Session::get('product');

        $combined = [];
        // prelazimo preko korpe i
        foreach ($cartItems as $item) {
            // pronadji proizvod na osnovu id koji smo izvukli iz korpe
            $product = ProductsModel::firstWhere(['id' => $item['product_id']]);
            // ako postoji upisi i prosledjujemo array na blade za ispis
            if ($product) {
                $combined[] = [
                    'name' => $product->name,
                    'amount' => $item['amount'],
                    'price' => $product->price,
                    'total' => $item['amount'] * $product->price
                ];
            }
        }

        return view('cart', [
            'combinedItems' => $combined
        ]);
    }
    public function addToCart(CartAddRequest $request)
    {
        $product = ProductsModel::where(['id'=> $request->id])->first();

        if ($product->amount < $request->amount){
            return redirect()->back();
        }
        // pravimo korpu
        Session::push('product',[
            'product_id' => $request->id,
            'amount' => $request->amount,
        ]);
        return redirect()->route('cart.all');
    }
}
