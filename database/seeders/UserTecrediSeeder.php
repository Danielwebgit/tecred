<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTecrediSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::query()->firstOrCreate(
            ['email' => 'tecredi@gmail.com'],
            [
                'name' => 'Tecredi',
                'password' => bcrypt('feras5566')
            ]
        );

    }
}
