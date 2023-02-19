<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // user test customer
        \App\Models\User::create([
            'name'              => 'Test User',
            'email'             => 'test@example.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('password'),
        ]);

        \App\Models\User::factory(10)->create();

        \App\Models\Post::factory(10)->create();

    }
}
