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
        factory(App\Book::class, 50)
            ->create()
            ->each(function ($b) {
                $b->genres()->save(factory(App\Genre::class)->make());
                $b->authors()->save(factory(App\Author::class)->make());
            });
    }
}
