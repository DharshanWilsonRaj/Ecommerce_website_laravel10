<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AdminController extends Controller
{

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function products(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::query();
            return Datatables::of($data)

                ->addColumn('actions', function ($row) {
                    return '<a href="' . route('product.edit', $row->id) . '">Edit</a> | <a href="' . route('product.delete', $row->id) . '">Delete</a>';
                })
                ->addColumn('image', function ($row) {
                    return '<img src="' . $row->image . '" alt="Product Image" width="40" >';
                })
                ->rawColumns(['actions', 'image'])
                ->make(true);
        }
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
            $request->file('image')->move(public_path($imageFolder), $request->file('image')->getClientOriginalName());
            $product->image = "/" . $imageFolder . "/" . $request->file('image')->getClientOriginalName();
        }
        $product->save();
        return redirect()->route('admin.products')->with('success', 'Product added successfully');
    }

    public function productEdit(Request $request, $id)
    {
        $product = Product::find($id);
        if (!!$product) {
            return view('admin.products.editProducts', ['product' => $product]);
        }
    }

    public function productUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stocks' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $product = Product::where('id', $id)->firstOrFail();
        $imageDir = $product->image;
        if ($request->hasFile('image')) {
            $imageFolder = 'product_images';
            // is there is any file exist first remove that
            if (!empty($imageDir) && file_exists(public_path($imageDir))) {
                unlink(public_path($imageDir));
            }
            $request->file('image')->move(public_path($imageFolder), $request->file('image')->getClientOriginalName());
            $imageDir = "/" . $imageFolder . "/" . $request->file('image')->getClientOriginalName();
        }


        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stocks' => $request->stocks,
            'image' => $imageDir,
        ]);

        return redirect()->route('admin.products')->with('success', 'Product updated successfully');
    }

    public function productDelete(Request $request, $id)
    {
        try {
            $product = Product::findOrFail($id);
            if (!empty($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
            $product->delete();
            return redirect()->route('admin.products')->with('success', 'Product deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('admin.products')->with('error', 'An error occurred during the deletion: ' . $e->getMessage());
        }
    }


    public function orders()
    {
        return view('admin.orders.index');
    }
}
