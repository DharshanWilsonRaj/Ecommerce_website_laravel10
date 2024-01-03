<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productsList()
    {
        $products = Product::get();

        return view('home', compact('products'));
    }
}
