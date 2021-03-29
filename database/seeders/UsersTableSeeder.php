<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        User::insert([
        	'username' 		=> 'admin',
        	'password' 		=> Hash::make('admin123'),
        	'created_at' 	=> date('Y-m-d'),
        	'updated_at' 	=> date('Y-m-d'),
        ]);
    }
}
