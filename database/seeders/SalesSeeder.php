<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sale;

class SalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $Sale = new Sale();
        $Sale ->name = 'Kodomo0';
        $Sale ->price = '1000';
        $Sale ->save();

        $Sale = new Sale();
        $Sale ->name = 'Kodomo1';
        $Sale ->price = '2000';
        $Sale ->save();

        $Sale = new Sale();
        $Sale ->name = 'Kodomo2';
        $Sale ->price = '3000';
        $Sale ->save();

        $Sale = new Sale();
        $Sale ->name = 'Kodomo4';
        $Sale ->price = '4000';
        $Sale ->save();

        $Sale = new Sale();
        $Sale ->name = 'Kodomo5';
        $Sale ->price = '5000';
        $Sale ->save();

        $Sale = new Sale();
        $Sale ->name = 'Kodomo6';
        $Sale ->price = '6000';
        $Sale ->save();
    }
}
