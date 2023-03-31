<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'name' => 'I Kadek Laxman Priharsena Astana',
            'email' => 'kadeklaxman00@gmail.com',
            'username' => 'laxman',
            'email_verified_at' => Carbon::now('GMT+8'),
            'password' => bcrypt('laxman*#'),
            'access' => 'admin',
            'created_at' => Carbon::now('GMT+8'),
        ]);
    }
}
