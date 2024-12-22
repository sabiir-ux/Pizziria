<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            ['name' => 'Pizza Dough', 'stock_quantity' => 100],
            ['name' => 'Cheese', 'stock_quantity' => 50],
            ['name' => 'Tomato Sauce', 'stock_quantity' => 75],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}