<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::findOrFail($id);

        $relatedProducts = Product::where(
            'category_id',
            $product->category_id
        )
        ->where('id', '!=', $product->id)
        ->take(4)
        ->get();

        return view(
            'product-detail',
            compact(
                'product',
                'relatedProducts'
            )
        );
    }
}