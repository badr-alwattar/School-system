<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456789'),
            'isAdmin' => true,
        ]);

        DB::table('users')->insert([
            'name' => 'badr',
            'email' => 'badr@gmail.com',
            'password' => Hash::make('123456789'),
            'isAdmin' => false,
        ]);

        DB::table('users')->insert([
            'name' => 'salem',
            'email' => 'salem@gmail.com',
            'password' => Hash::make('123456789'),
            'isAdmin' => false,
        ]);

        DB::table('users')->insert([
            'name' => 'mohammed',
            'email' => 'mohammed@gmail.com',
            'password' => Hash::make('123456789'),
            'isAdmin' => false,
        ]);
    }
}
