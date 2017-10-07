<?php

use Illuminate\Database\Seeder;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();

        for ($i = 0; $i < 100; $i++) {
            $book = new \App\Books();
            $book->author = $faker->name;
            $book->title = $faker->company;
            $book->category = 2;
            $book->img = 'ss.jpg';
            $book->save();
        }
    }
}
