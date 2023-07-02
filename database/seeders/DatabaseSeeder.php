<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Adding an admin user
        $user = \App\Models\User::factory()
            ->count(1)
            ->create([
                'email' => 'admin@chambalo.com',
                'name'=>'Deodatha Chambalo',
                'phone'=>'0783562967',
                'password' => \Hash::make('admin'),
            ]);
        $this->call(PermissionsSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(PostCategorySeeder::class);
        $this->call(UserSeeder::class);
    }
}
