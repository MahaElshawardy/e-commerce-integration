<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ImageSeed extends Seeder
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
                'image_path' => 'images/products/man-shirt-black.jpg',
                "created_by" => 1,
            ],
            [
                'id' => 2,
                'image_path' => 'images/products/man-shirt-blue.jpg',
                "created_by" => 1,
            ],

        ];
        foreach ($images as $image) {
            Image::create($image);
        }
    }
}
