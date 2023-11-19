<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->delete();
        $admins = [
            [
                'id' => 1,
                'name' => 'maha',
                'email' => 'melshawardy@gmail.com',
                "password" => bcrypt('123456789'),
                'phone' => '01066655142',
                // 'status' => 1,
                // 'sort' => 1,
            ]
        ];
        foreach ($admins as $admin) {
            User::create($admin);
        }
    }
}
