<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Ahmed Atef',
            'email' => 'ahmedatefsallam7@gmail.com',
            'password' => 'Ah,Atef,med',
            'status' => 'Admin',
            'image' => 'images\users_imgs\IMG_٢٠٢٠٠٦١٧_١٩٠٢٣٩_١٩٢.JPG',
            // 'remember_token' => Str::random(10),
        ]);
    }
}