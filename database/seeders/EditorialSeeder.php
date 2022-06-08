<?php

namespace Database\Seeders;

use App\Models\Editorial;
use Illuminate\Database\Seeder;

class EditorialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $editorial = new Editorial();
        $editorial->name = 'Ivrea';
        $editorial->origin = 'España';
        $editorial->save();
    }
}
