<?php

namespace Database\Seeders\settings;

use App\Models\Settings\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'Ronaldo@gmail.com',
            'password' => bcrypt('123'), // Use a secure password in production
        ]);
    }

    // php artisan db:seed --database=settings --class=Database\\Seeders\\settings\\UserSeeder
}
