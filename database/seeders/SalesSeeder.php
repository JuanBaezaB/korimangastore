<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sales;

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
        $sales = new Sales();
        $sales ->name = 'Kodomo0';
        $sales ->price = '1000';
        $sales ->save();

        $sales = new Sales();
        $sales ->name = 'Kodomo1';
        $sales ->price = '2000';
        $sales ->save();

        $sales = new Sales();
        $sales ->name = 'Kodomo2';
        $sales ->price = '3000';
        $sales ->save();

        $sales = new Sales();
        $sales ->name = 'Kodomo4';
        $sales ->price = '4000';
        $sales ->save();

        $sales = new Sales();
        $sales ->name = 'Kodomo5';
        $sales ->price = '5000';
        $sales ->save();

        $sales = new Sales();
        $sales ->name = 'Kodomo6';
        $sales ->price = '6000';
        $sales ->save();
    }
}
