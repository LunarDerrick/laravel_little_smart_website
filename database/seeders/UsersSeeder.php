<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // set admin account
        User::factory()->create([
            'id' => 100000,
            'username' => 'admin',
            'name' => 'Admin',
            'role' => 'teacher',
            'age' => 99,
            'telno' => '012-3456789',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
        ]);

        User::factory(5)->create();
    }
}
