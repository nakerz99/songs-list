<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('users')->insert([
                'firstname' => 'admin',
                'lastname' => 'exam',
                'email' => 'admin'.'@exam.com',
                'password' => bcrypt('password'),
            ]);
       
    }
}
