<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Jobs\ProcessProductImages;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

//* Important: using custom request 'productRequest'

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('perpage', 5); // Parámetro opcional para paginación, por defecto 5
        $page = $request->input('page', 1); // Parámetro opcional para la página, por defecto es 1

        $products = Cache::remember('product_index', 60, function () {
            return Product::with('images')->get();
        });

        $paginatedProducts = $products->forPage($page, $perPage);

        return new ProductCollection($paginatedProducts);

    }
    public function show($id)
    {
        $product = Product::withTrashed()->with('images')->find($id);
        if ($product === null || $product->trashed()) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return new ProductResource($product);
    }
    public function store(ProductRequest $request)
    {
        //* Important: On job dispatch, canot use serialize objects
        $product = Product::create($request->only(['name', 'price', 'qty']));

        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('images', 'public');
                $imagePaths[] = $path;
            }
        }



        processProductImages::dispatch($product, $imagePaths, $request->input('urls', []));


        return response()->json(['message' => 'Product creation in progress'], 202); //* return ACK
    }
    public function update(Request $request, $id)
    {



        $product=Product::find($id);
        if (!$product) {
            return response()->json([
                'status' => 'error',
                'message' => 'Product not found',
            ]);
        }

        $product->update($request->only(['name', 'price', 'qty']));
        Cache::forget('product_index');

        return response()->json($product, 200); //* OK
    }
    public function destroy($id)
    {
        $product=Product::find($id);
        if (!$product) {
            return response()->json([
                'status' => 'error',
                'message' => 'Product not found',
            ]);
        }
        $product->delete();
        Cache::forget('product_index');
        return response()->json(null, 204); //* no content
    }
    //! to Implement the restore method set patch method to /products/{id}/restore
    public function restore($id)
    {
        $product=Product::withTrashed()->find($id);
        if (!$product) {
            return response()->json([
                'status' => 'error',
                'message' => 'Product not found',
            ]);
        }
        $product->restore();
        Cache::forget('product_index');
        return response()->json(null, 200); //* 200 means OK
    }
}
