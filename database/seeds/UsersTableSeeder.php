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
        for ($i=0; $i > 10; $i++) { 
            DB::table('users')->insert([
                'firstname' => Str::random(10),
                'lastname' => Str::random(10),
                'email' => Str::random(10).'@exam.com',
                'password' => bcrypt('password'),
            ]);
        }
       
    }
}
