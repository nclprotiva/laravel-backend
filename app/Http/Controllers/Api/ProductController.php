<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JWTAuth;
use App\Models\Product;

class ProductController extends Controller
{
    protected $user;
 
    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }
    public function index()
    {
        $products = Product::orderBy('created_at', 'DESC')
                    ->get(['title', 'description', 'price', 'image'])
                    ->toArray();

        return $products;
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
    
        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, product with id ' . $id . ' cannot be found'
            ], 400);
        }
    
        return $product;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'       => 'required',
            'description' => 'required',
            'price'       => 'required|integer'
        ]);
    
        $product = new Product;
        $product->title       = $request->title;
        $product->description = $request->description;
        $product->price       = $request->price;
        $product->image       = $request->image;
    
        if (save($product))
            return response()->json([
                'success' => true,
                'product' => $product
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Sorry, product could not be added'
            ], 500);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
    
        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, product with id ' . $id . ' cannot be found'
            ], 400);
        }
    
        $updated = $product->fill($request->all())
            ->save();
    
        if ($updated) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, product could not be updated'
            ], 500);
        }
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
    
        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, product with id ' . $id . ' cannot be found'
            ], 400);
        }
    
        if ($product->delete()) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Product could not be deleted'
            ], 500);
        }
    }
}
