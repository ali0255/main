<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class User extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
                'name' => 'یوسف مقدم',
                'phone' => '09109693365',
                'email' => 'yousef.wersy@gmail.com',
                'email_verified_at' => time(),
                'created_at' => time(),
            ]
        );
        DB::table('users')->insert(
            [
                'name' => 'علی ساداتمن',
                'phone' => '09194530364',
                'email' => 'Alisaadatman@gmail.com',
                'email_verified_at' => time(),
                'created_at' => time(),
            ]
        );
    }
}
