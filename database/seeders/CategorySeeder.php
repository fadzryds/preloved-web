<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [

            [
                'name' => 'Coquette',
                'slug' => 'coquette',
                'image' => 'categories/coquette.png'
            ],

            [
                'name' => 'Y2K',
                'slug' => 'y2k',
                'image' => 'categories/y2k.png'
            ],

            [
                'name' => 'Streetwear',
                'slug' => 'streetwear',
                'image' => 'categories/streetwear.png'
            ],

            [
                'name' => 'Dress',
                'slug' => 'dress',
                'image' => 'categories/dress.png'
            ],

            [
                'name' => 'Skirt',
                'slug' => 'skirt',
                'image' => 'categories/skirt.png'
            ],

            [
                'name' => 'Top',
                'slug' => 'top',
                'image' => 'categories/top.png'
            ],

        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}