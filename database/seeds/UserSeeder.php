<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Test User",
            'email' => "user@user.com",
            'password' => Hash::make("user")
        ]);
        DB::table('users')->insert([
            'name' => "Test Admin",
            'email' => "admin@admin.com",
            'password' => Hash::make("admin"),
            'is_admin' => 1
        ]);
    }
}
