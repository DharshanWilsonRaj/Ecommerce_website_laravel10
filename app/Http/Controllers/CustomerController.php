<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class CustomerController extends Controller
{
    public function cartPage()
    {
        return view('cart');
    }

    public function addCart(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('home')->with('error', 'Product not found.');
        }
        $user = auth()->user();
        if (!$user) {
            $shoppingCart = session('shoppingCart', []);
            if (isset($shoppingCart[$id])) {
                $shoppingCart[$id]['quantity'] += 1;
                $shoppingCart[$id]['subtotal'] =   $product->price *  $shoppingCart[$id]['quantity'];
            } else {
                $product = Product::findOrFail($id);
                $shoppingCart[$id] = [
                    'id' => $id,
                    'product_name' => $product->name,
                    'image' => $product->image,
                    'price' => $product->price,
                    'quantity' => 1,
                    'subtotal' => $product->price,
                ];
            }
            session(['shoppingCart' => $shoppingCart]);
        } else {
            $cart = new Cart;
           
        }
        return redirect('/');
    }
}
