<?php

namespace Database\Seeders;

use App\Models\FigureType;
use Illuminate\Database\Seeder;

class FigureTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $type = new FigureType();
        $type->name = 'Gachapon';
        $type->save();

        $type = new FigureType();
        $type->name = 'Hikkake Figure';
        $type->description = 'Figura de 2 partes.';
        $type->save();

        $type = new FigureType();
        $type->name = 'Figuarts mini';
        $type->description = 'Altura: 9 cm aprox.';
        $type->save();

        $type = new FigureType();
        $type->name = 'FiguartsZero';
        $type->description = 'Altura: 19 cm aprox.';
        $type->save();


        
    }
}
