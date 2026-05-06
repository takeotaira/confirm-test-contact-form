<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
{
    // 確認者用ユーザー
    User::create([
        'name' => 'test user',
        'email' => 'test@example.com',
        'password' => Hash::make('password'),
    ]);

    $this->call([
        CategorySeeder::class,
        ContactSeeder::class,
    ]);
}
}
