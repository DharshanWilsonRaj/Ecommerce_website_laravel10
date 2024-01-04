<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();
        Cart::add([
            'id' => $product->id,
            'product_name' => $product->name,
            'image' => $product->image,
            'customer_id' => $product->name,
            'product_price' => $product->price,
            'quantity' => $product->name,
            'subtotal' => $product->name,
        ]);

        return redirect('/');
    }
}
