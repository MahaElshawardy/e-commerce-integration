<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Size;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::get();
        $variations = Product::with('variations.product_color.color', 'variations.images', 'variations.sizes')
            ->get()
            ->pluck('variations')
            ->flatten();
        // $colors = Product::with('product_colors.color')
        //     ->get()
        //     ->pluck('product_colors')
        //     ->flatten();

        return view('dashboard.products.index', compact('products', 'variations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sizes = Size::get();
        $colors = Color::get();
        return view('dashboard.products.create', compact('colors', 'sizes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, Product $product)
    {
        $product = $product->find($id)->delete();
        return back()->with('message', 'Deleted Successfuly');
    }
}
