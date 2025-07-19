<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::where('is_active', true)->findOrFail($id);
        $relatedProducts = Product::where('is_active', true)
            ->where('category', $product->category)
            ->where('id', '!=', $product->id)
            ->limit(4)
            ->get();

        return view('products.show', compact('product', 'relatedProducts'));
    }

    public function search(Request $request)
    {
        $query = $request->get('q');
        $category = $request->get('category');
        
        $products = Product::where('is_active', true);

        if ($query) {
            $products->where(function($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%')
                  ->orWhere('description', 'like', '%' . $query . '%')
                  ->orWhere('origin_country', 'like', '%' . $query . '%');
            });
        }

        if ($category) {
            $products->where('category', $category);
        }

        $products = $products->orderBy('created_at', 'desc')->paginate(12);

        return view('products.index', compact('products', 'query', 'category'));
    }
}