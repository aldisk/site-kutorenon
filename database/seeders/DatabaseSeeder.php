<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('admins')->insert([
            'name' => 'Admin-Kutorenon',
            'username' => 'admin',
            'password' => '$2y$10$NBTQLiMXgvfRnrgQ8oiiCeIOun8AyMqX7/88lnutb.MQvX9PZqxd.'
        ]);
    }
}
