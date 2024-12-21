<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{ // Get all products
    public function index() {
        return response()->json(Product::all());
    }

    // Get a single product
    public function show($id) {
        $product = Product::find($id);
        if ($product) {
            return response()->json($product);
        }
        return response()->json(['message' => 'Product not found'], 404);
    }

    // Create a new product
    public function store(Request $request) {
        $product = Product::create($request->all());
        return response()->json($product, 201);
    }

    // Update an existing product
    public function update(Request $request, $id) {
        $product = Product::find($id);
        if ($product) {
            $product->update($request->all());
            return response()->json($product);
        }
        return response()->json(['message' => 'Product not found'], 404);
    }

    // Delete a product
    public function destroy($id) {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            return response()->json(['message' => 'Product deleted']);
        }
        return response()->json(['message' => 'Product not found'], 404);
    }
}
