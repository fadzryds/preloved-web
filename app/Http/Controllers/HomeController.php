<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        $newArrivals = Product::where('is_featured', false)
            ->latest()
            ->take(4)
            ->get();

        $topSelling = Product::where('is_featured', true)
            ->take(4)
            ->get();

        return view('home', compact(
            'categories',
            'newArrivals',
            'topSelling'
        ));
    }
}