<?php

use Illuminate\Database\Seeder;

class AnimalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $animals = ['kucing', 'anjing', 'semut'];

        foreach ($animals as $animal){
            DB::table('animals')->insert([
                'animal_name' => $animal
            ]);
        }
    }
}
