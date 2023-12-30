<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate();
        return view(
            'products.index',
            [
                'products' => $products
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        $image = $request->file('image');
        $image->storeAs('public/images', $image->hashName());

        $result = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $image->hashName(),
            'status' => $request->status,
        ]);

        if ($result) {
            return redirect()->route('product.index')->with('success', 'Product created successfully');
        } else {
            return redirect()->route('product.index')->with('error', 'Product created failed');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('local')->delete('public/images/' . $product->image);
            $image = $request->file('image');
            $image->storeAs('public/images', $image->hashName());

            $product->update([
                'name' => $request->name,
                'price' => $request->price,
                'image' => $image->hashName(),
                'status' => $request->status,
            ]);
        } else {
            $product->update([
                'name' => $request->name,
                'price' => $request->price,
                'status' => $request->status,
            ]);
        }

        if ($product) {
            return redirect()->route('product.index')->with('success', 'Product updated successfully');
        }else{
            return redirect()->route('product.index')->with('error', 'Product updated failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Storage::disk('local')->delete('public/images/' . $product->image);
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted successfully');
    }
}
