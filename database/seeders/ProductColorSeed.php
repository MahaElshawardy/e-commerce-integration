<?php

namespace Database\Seeders;

use App\Models\ProductColor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductColorSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('images')->delete();
        $images = [
            [
                'id' => 1,
                'product_id' => 1,
                "color_id" => 2,
            ],
            [
                'id' => 2,
                'product_id' => 1,
                "color_id" => 4,
            ],

        ];
        foreach ($images as $image) {
            ProductColor::create($image);
        }
    }
}
