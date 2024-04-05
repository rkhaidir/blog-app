<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\Post::factory(100)->create();
        // \App\Models\Category::factory(5)->create();

        \App\Models\User::create([
            "name"=> "Rakhmat Khaidir",
            "email" => "hi@rakhmatkhaidir.com",
            "password" => Hash::make("perdanacom12"),
            "role" => "ADMIN"
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
