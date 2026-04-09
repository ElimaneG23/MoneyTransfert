<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; // <-- Ajouté ici

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         User::create([
            'name' => 'Alice',
            'email' => 'alice@example.com',
            'password' => bcrypt('secret'),
        ]);

        User::create([
            'name' => 'Bob',
            'email' => 'bob@example.com',
            'password' => bcrypt('secret'),
        ]);

        User::create([
            'name' => 'Charlie',
            'email' => 'charlie@example.com',
            'password' => bcrypt('secret'),
        ]);

        User::create([
            'name' => 'David',
            'email' => 'david@example.com',
            'password' => bcrypt('secret'),
        ]);

        User::create([
            'name' => 'Eve',
            'email' => 'eve@example.com',
            'password' => bcrypt('secret'),
        ]);

        User::create([
            'name' => 'Frank',
            'email' => 'frank@example.com',
            'password' => bcrypt('secret'),
        ]);

        User::create([
            'name' => 'Grace',
            'email' => 'grace@example.com',
            'password' => bcrypt('secret'),
        ]);

        User::create([
            'name' => 'Hannah',
            'email' => 'hannah@example.com',
            'password' => bcrypt('secret'),
        ]);

        User::create([
            'name' => 'Ivan',
            'email' => 'ivan@example.com',
            'password' => bcrypt('secret'),
        ]);

        User::create([
            'name' => 'Judy',
            'email' => 'judy@example.com',
            'password' => bcrypt('secret'),
        ]);
    }
}