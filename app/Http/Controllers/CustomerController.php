<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function cartPage()
    {
        return view('cart');
    }
    public function addCart(Request $request, $id)
    {
    }
}
