<?php

use Illuminate\Database\Seeder;
use app\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Admin',
            'email'=>'admin@forca.com',
            'is_admin'=>'1',
            'password'=> bcrypt('1q2w3e4r@'),
        ]);
        DB::table('users')->insert([
            'name'=>'Jogador',
            'email'=>'jogador@forca.com',
            'is_admin'=>'0',
            'password'=> bcrypt('1q2w3e4r@'),
        ]);
    }
}
