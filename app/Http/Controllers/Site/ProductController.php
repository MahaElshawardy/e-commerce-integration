<?php

namespace App\Http\Controllers\Site;

use App\Models\Size;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductColor;
use Illuminate\Http\Request;
use App\Services\ShipmentService;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    protected $shipmentService;

    public function __construct(ShipmentService $shipmentService)
    {
        $this->shipmentService = $shipmentService;
        // $this->middleware('refresh.token');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::with('product_colors.color', 'variations.images', 'variations.sizes');
        if ($request->filled('color_id')) {
            $colorId = $request->input('color_id', []);
            $query->whereHas('product_colors', function ($subQuery) use ($colorId) {
                $subQuery->whereIn('color_id', $colorId);
            });
        }

        if ($request->filled('price')) {
            $price = $request->input('price');
            $query->whereHas('variations', function ($subQuery) use ($price) {
                $subQuery->where('price', '<=', $price);
            });
        }

        if ($request->filled('size_id')) {
            $sizeId = $request->input('size_id', []);
            $query->whereHas('variations', function ($subQuery) use ($sizeId) {
                $subQuery->whereIn('size_id', $sizeId);
            });
        }
        $products = $query->get();
        $colors = Color::get();
        $sizes = Size::get();
        return view('site.product.index', compact('products', 'colors', 'sizes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show($id, Product $product, Request $request)
    {
        $query = $product->with('product_colors.color', 'variations.images', 'variations.sizes');
        if ($request->filled('color_id')) {
            $colorId = $request->input('color_id');
            $colorId = ProductColor::where('color_id', $colorId)->first();
            $query->with('variations', function ($subQuery) use ($colorId, $request, $id, $product) {
                $subQuery->where('color_id', 'LIKE', '%' . $colorId->id . '%');
            });
        }
        if ($request->filled('size_id')) {
            $priceQuantity = $this->get_color($id, $request, $product);
        } else {
            $priceQuantity = NULL;
        }
        $product = $query->find($id);
        $sizes = $product->variations->pluck('sizes')->flatten()->unique();

        $image = $product->variations->pluck('images')->flatten()->first();
        $response = $this->shipmentService->createProduct($product);
        dd($response);
        return view('site.product.show', compact('product', 'sizes', 'image', 'priceQuantity'));
    }

    /**
     * Display the specified resource.
     */
    public function get_color($id, $request, $product)
    {
        $query = $product->with('product_colors.color', 'variations.images', 'variations.sizes');
        if ($request->filled('color_id')) {
            $colorId = $request->input('color_id');
            $colorId = ProductColor::where('color_id', $colorId)->first();
            $query->with('variations', function ($subQuery) use ($colorId, $request) {
                $subQuery->where('color_id', 'LIKE', '%' . $colorId->id . '%');
                if ($request->filled('size_id')) {
                    $sizeId = $request->input('size_id');
                    $subQuery->where('size_id', 'LIKE', '%' . $sizeId . '%');
                }
            });
        }
        $product = $query->find($id);
        // $priceQuantity = $product->variations->first();
        return $product;
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
    public function destroy(Product $product)
    {
        //
    }
}
