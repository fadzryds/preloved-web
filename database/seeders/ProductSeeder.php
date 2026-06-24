<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // NEW ARRIVALS

        Product::create([
            'category_id' => Category::where('slug','top')->first()->id,
            'name' => 'Ribbon Baby Tee',
            'description' => 'Cute baby tee with ribbon pattern.',
            'price' => 89000,
            'discount_price' => 109000,
            'size' => 'M',
            'condition' => 'Like New',
            'stock' => 1,
            'image' => 'products/new1.png',
            'is_featured' => false
        ]);

        Product::create([
            'category_id' => Category::where('slug','top')->first()->id,
            'name' => 'Lace Trim Tank Top',
            'description' => 'Pink striped tank top.',
            'price' => 79000,
            'discount_price' => 85000,
            'size' => 'S',
            'condition' => 'Excellent',
            'stock' => 1,
            'image' => 'products/new2.png',
            'is_featured' => false
        ]);

        Product::create([
            'category_id' => Category::where('slug','skirt')->first()->id,
            'name' => 'Pastel Pleated Mini Skirt',
            'description' => 'Cute layered skirt.',
            'price' => 129000,
            'discount_price' => 161000,
            'size' => 'L',
            'condition' => 'Like New',
            'stock' => 1,
            'image' => 'products/new3.png',
            'is_featured' => false
        ]);

        Product::create([
            'category_id' => Category::where('slug','top')->first()->id,
            'name' => 'Y2K Lace Bolero',
            'description' => 'Y2K style bolero.',
            'price' => 119000,
            'discount_price' => 125000,
            'size' => 'M',
            'condition' => 'Excellent',
            'stock' => 1,
            'image' => 'products/new4.png',
            'is_featured' => false
        ]);

        // TOP SELLING

        Product::create([
            'category_id' => Category::where('slug','top')->first()->id,
            'name' => 'Fluffy Heart Knit Vest',
            'description' => 'Cute pink vest.',
            'price' => 89000,
            'discount_price' => 105000,
            'size' => 'M',
            'condition' => 'Good',
            'stock' => 1,
            'image' => 'products/top1.png',
            'is_featured' => true
        ]);

        Product::create([
            'category_id' => Category::where('slug','top')->first()->id,
            'name' => 'Rosette Tube Top',
            'description' => 'Sweet pastel tube top.',
            'price' => 79000,
            'discount_price' => 85000,
            'size' => 'S',
            'condition' => 'Like New',
            'stock' => 1,
            'image' => 'products/top2.png',
            'is_featured' => true
        ]);

        Product::create([
            'category_id' => Category::where('slug','top')->first()->id,
            'name' => 'Butterfly Mesh Long Sleeve',
            'description' => 'Elegant mesh top.',
            'price' => 129000,
            'discount_price' => 161000,
            'size' => 'L',
            'condition' => 'Excellent',
            'stock' => 1,
            'image' => 'products/top3.png',
            'is_featured' => true
        ]);

        Product::create([
            'category_id' => Category::where('slug','top')->first()->id,
            'name' => 'Pink Bow Lucy Shirt',
            'description' => 'Sweet pink bow shirt.',
            'price' => 119000,
            'discount_price' => 125000,
            'size' => 'M',
            'condition' => 'Like New',
            'stock' => 1,
            'image' => 'products/top4.png',
            'is_featured' => true
        ]);
    }
}