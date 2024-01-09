<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{

    public function customerProfile()
    {
        $user = auth()->user();
        return view('profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();


        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' => 'required|string',
            'phone' => 'required|numeric',
        ]);

        $imageDir = $user->image;
        if ($request->hasFile('image')) {
            $imageFolder = 'profile_image';
            // is there is any file exist first remove that
            if (!empty($imageDir) && file_exists(public_path($imageDir))) {
                unlink(public_path($imageDir));
            }
            $request->file('image')->move(public_path($imageFolder), $request->file('image')->getClientOriginalName());
            $imageDir = "/" . $imageFolder . "/" . $request->file('image')->getClientOriginalName();
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'image' => $imageDir,
        ]);

        return redirect('/');
    }

    public function cartPage()
    {
        $carts = [];
        $shippingCost = 15;
        $totalCost = 0;
        $subtotal = 0;
        if (Auth::user()) {
            $carts = Cart::where('customer_id', Auth::id())->get();
        } else {
            $carts = session()->get('shoppingCart', []);
        }
        foreach ($carts as $cartItem) {
            $subtotal += $cartItem->quantity * $cartItem->price;
        }

        $totalCost = $subtotal + $shippingCost;
        return view('cart', compact('carts', 'totalCost', 'shippingCost'));
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
            $product = Product::findOrFail($id);
            $isExistcart = Cart::where('product_id', $id)
                ->where('customer_id', Auth::id())
                ->first();

            if ($isExistcart) {
                $newQuantity = $isExistcart->quantity + 1;
                $newSubtotal = $product->price * $newQuantity;
                // Update the existing cart record with new quantity and subtotal
                $isExistcart->update([
                    'quantity' => $newQuantity,
                    'subtotal' => $newSubtotal,
                ]);
            } else {
                $cart = new Cart([
                    'product_id' =>  $id,
                    'customer_id' => Auth::id(),
                    'product_name' => $product->name,
                    'image' => $product->image,
                    'price' => $product->price,
                    'quantity' => 1,
                    'subtotal' => $product->price
                ]);
                $cart->save();
            }
        }
        notify()->success('Added in cart⚡️');
        return redirect('/');
    }



    public function updateCart($id, $action)
    {
        $cart = Cart::where('id', $id)->first();

        if ($action == 'add') {
            $product = Product::where('id', $cart->product_id)->first();
            $stocks = $product->stocks;

            $newQuantity = $cart->quantity;
            $newSubtotal = $cart->price;

            if ($cart->quantity < $stocks) {
                $newQuantity = $cart->quantity + 1;
                $newSubtotal = $cart->price * $newQuantity;
                $cart->update([
                    'quantity' =>  $newQuantity,
                    'subtotal' =>  $newSubtotal,
                ]);
            }
            return response()->json([
                'quantity' => $newQuantity,
                'subtotal' => $newSubtotal,
            ]);
        }
    }
}
