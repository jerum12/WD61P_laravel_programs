<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::all();
        $response = ['code'=> 200, 'message'=> 'Products successfully retrieved!', 'data'=> ProductResource::collection($products)];

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
        $product = Product::create($input);
        $response = ['code'=> 200, 'message'=> 'Products successfully created!', 'data'=> new ProductResource($product)];
        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $product = Product::findOrFail($id);
        $response = ['code'=> 200, 'message'=> 'Product successfully retreived!', 'data'=> new ProductResource($product)];
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $input = $request->all();
        $product = Product::findOrFail($id);
        // if(empty($product)){
        //     return 'No id found';
        // }
        $product->update($input);

        $response = ['code'=> 200, 'message'=> 'Product update successfully!', 'data'=> new ProductResource($product)];
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $product = Product::findOrFail($id);
        $product->delete();

        $response = ['code'=> 200, 'message'=> 'Products successfully deleted!'];
        return $response;
    }
}
