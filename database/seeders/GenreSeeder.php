<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genre = new Genre();
        $genre ->name = 'Kodomo';
        $genre ->type = 'Demografía';
        $genre ->save();

        $genre = new Genre();
        $genre ->name = 'Josei';
        $genre ->type = 'Demografía';
        $genre ->save();

        $genre = new Genre();
        $genre ->name = 'Shôjo';
        $genre ->type = 'Demografía';
        $genre ->save();

        $genre = new Genre();
        $genre ->name = 'Seinen';
        $genre ->type = 'Demografía';
        $genre ->save();

        $genre = new Genre();
        $genre ->name = 'Shônen';
        $genre ->type = 'Demografía';
        $genre ->save();
    }
}
