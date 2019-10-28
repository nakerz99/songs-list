<?php

use Illuminate\Database\Seeder;

class SongsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for($i = 0; $i < 100; $i++) {

            App\Song::create([
                'title' => $faker->word.' '.$faker->unique->word,
                'lyrics' => $faker->paragraph(rand(4, 6)),
                'artist' => $faker->firstNameMale. ' '.$faker->lastName,
                'created_by' =>  App\User::all()->random()->id,
            ]);
        }
    }
}
