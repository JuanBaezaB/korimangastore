<?php

namespace Database\Seeders;

use App\Models\Serie;
use Illuminate\Database\Seeder;

class SerieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $serie = new Serie();
        $serie->name = 'Berserk';
        $serie->save();

        $serie = new Serie();
        $serie->name = 'One Punch Man';
        $serie->save();

        $serie = new Serie();
        $serie->name = 'Jojo\'s Bizarre Adventure';
        $serie->save();
    }
}
