<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use App\Models\OrderItems;
use App\Models\Orders;
use App\Models\ProductsModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends Controller
{
    public function index()
    {
        // cuvamo celu korpu
        $cartItems = Session::get('product');

        if (count($cartItems) < 1) {
            return redirect('/');
        }

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

    public function finishOrder()
    {
        $cartItems = Session::get('product');
        $totalCartPrice = 0;
        // izvlacimo svaki item i provera da li ga ima na stanju
        foreach ($cartItems as $item) {
            $product = ProductsModel::firstWhere(['id'=> $item['product_id']]);
            $totalCartPrice += $item['amount'] * $product->price;

            if ($item['amount'] > $product->amount) {
                return redirect()->back();
            }
        }
        $order = Orders::create([
            'user_id' => Auth::id(),
            'price' => $totalCartPrice
        ]);

        foreach ($cartItems as $item) {
            $product = ProductsModel::firstWhere(['id'=> $item['product_id']]);
            // skidamo kolicinu
            $product->amount -= $item['amount'];
            $product->save();

            OrderItems::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'amount' => $item['amount'],
                'price' => $item['amount'] * $product->price,
            ]);
        }
        Session::remove('product');
        return view('thankYou');
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
