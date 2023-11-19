<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('colors')->delete();
        $colors = [
            [
                'id' => 1,
                'color_name' => 'ForestGreen',
                'color_hex' => '#228B22',
                "created_by" => 1,
            ],
            [
                'id' => 2,
                'color_name' => 'Black',
                'color_hex' => '#000000',
                "created_by" => 1,
            ],
            [
                'id' => 3,
                'color_name' => 'DarkRed',
                'color_hex' => '#8B0000',
                "created_by" => 1,
            ],
            [
                'id' => 4,
                'color_name' => 'Blue',
                'color_hex' => '#0000FF',
                "created_by" => 1,
            ]
        ];
        foreach ($colors as $color) {
            Color::create($color);
        }
    }
}
