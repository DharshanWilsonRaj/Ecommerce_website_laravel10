<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function products()
    {
        return view('admin.products.index');
    }
    public function productAdd()
    {
        return view('admin.products.addProducts');
    }

    public function productStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stocks' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $product = new Product([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'stocks' => $request->input('stocks'),
            'description' => $request->input('description'),
        ]);

        if ($request->hasFile('image')) {
            $imageFolder = 'product_images';
            Storage::makeDirectory($imageFolder);
            $imagePath = $request->file('image')->store($imageFolder, 'public');
            $product->image = $imagePath;
        }
        $product->save();
        return redirect()->route('admin.products')->with('success', 'Product added successfully');
    }
    
    public function productEdit()
    {
        return view('admin.products.addProducts');
    }
    public function productUpdate()
    {
    }
    public function productDelete()
    {
    }


    public function orders()
    {
        return view('admin.orders.index');
    }
}
