<?php
//este seeder es para prueba de venta y grafico
namespace Database\Seeders;

use App\Models\PruebaVenta;
use Illuminate\Database\Seeder;

class PruebaVentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $venta = new PruebaVenta();
        $venta->name = 'Manga';
        $venta ->price = '1000';
        $venta->save();

        $venta = new PruebaVenta();
        $venta ->name = 'Kodomo';
        $venta ->price = '1000';
        $venta ->save();

        $venta = new PruebaVenta();
        $venta ->name = 'Kodomo2';
        $venta ->price = '2000';
        $venta ->save();

        $venta = new PruebaVenta();
        $venta ->name = 'Kodomo3';
        $venta ->price = '3000';
        $venta ->save();

        $venta = new PruebaVenta();
        $venta ->name = 'Kodomo4';
        $venta ->price = '4000';
        $venta ->save();

        $venta = new PruebaVenta();
        $venta ->name = 'Kodomo5';
        $venta ->price = '5000';
        $venta ->save();

        $venta = new PruebaVenta();
        $venta ->name = 'Kodomo6';
        $venta ->price = '6000';
        $venta ->save();

        $venta = new PruebaVenta();
        $venta ->name = 'Kodomo7';
        $venta ->price = '7000';
        $venta ->save();

        $venta = new PruebaVenta();
        $venta ->name = 'Kodomo8';
        $venta ->price = '8000';
        $venta ->save();

        $venta = new PruebaVenta();
        $venta ->name = 'Kodomo9';
        $venta ->price = '9000';
        $venta ->save();
    }
}
