<?php

namespace Database\Seeders;

use App\Models\Format;
use Illuminate\Database\Seeder;

class FormatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $format = new Format();
        $format->name = 'Tanokoubon';
        $format->save();
    }
}
