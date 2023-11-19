<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sizes')->delete();
        $sizes = [
            [
                'id' => 1,
                'size' => 'S',
                "created_by" => 1,
            ],
            [
                'id' => 2,
                'size' => 'L',
                "created_by" => 1,
            ],
            [
                'id' => 3,
                'size' => 'XL',
                "created_by" => 1,
            ]
        ];
        foreach ($sizes as $size) {
            Size::create($size);
        }
    }
}
