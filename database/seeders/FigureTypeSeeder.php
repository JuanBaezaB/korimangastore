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
        
    }
}
