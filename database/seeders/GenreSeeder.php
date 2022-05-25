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

        $genre = new Genre();
        $genre ->name = 'Gakuen';
        $genre ->type = 'Temático';
        $genre ->save();

        $genre = new Genre();
        $genre ->name = 'Gekiga';
        $genre ->type = 'Temático';
        $genre ->save();

        $genre = new Genre();
        $genre ->name = 'Sentai';
        $genre ->type = 'Temático';
        $genre ->save();

        $genre = new Genre();
        $genre ->name = 'Mecha';
        $genre ->type = 'Temático';
        $genre ->save();

        $genre = new Genre();
        $genre ->name = 'Cyberpunk';
        $genre ->type = 'Temático';
        $genre ->save();

        $genre = new Genre();
        $genre ->name = 'Gore';
        $genre ->type = 'Temático';
        $genre ->save();

        $genre = new Genre();
        $genre ->name = 'Jidaimono';
        $genre ->type = 'Temático';
        $genre ->save();

        $genre = new Genre();
        $genre ->name = 'Harem';
        $genre ->type = 'Temático';
        $genre ->save();

        $genre = new Genre();
        $genre ->name = 'Yuri';
        $genre ->type = 'Temático';
        $genre ->save();

        $genre = new Genre();
        $genre ->name = 'Yaoi';
        $genre ->type = 'Temático';
        $genre ->save();

        $genre = new Genre();
        $genre ->name = 'Ecchi';
        $genre ->type = 'Temático';
        $genre ->save();

        $genre = new Genre();
        $genre ->name = 'Dojinshi';
        $genre ->type = 'Temático';
        $genre ->save();

        $genre = new Genre();
        $genre ->name = 'Isekai';
        $genre ->type = 'Temático';
        $genre ->save();
    }
    
    
}
