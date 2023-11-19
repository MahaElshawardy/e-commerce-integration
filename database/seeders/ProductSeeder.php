<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->delete();
        $products = [
            [
                'id' => 1,
                'name' => 'Defacto Man Young Regular Fit Woven Long Sleeve Shirt',
                'description' => 'Founded in 2003, DEFACTO is today one of the most popular fashion brands in Turkey and around the world with more than 242 stores. It is positioned as a pioneering brand of fashion throughout the',
                'price'=>'500',
                "created_by" => 1,
            ],

        ];
        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
