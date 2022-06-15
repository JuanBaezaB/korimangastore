<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Provider;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $provider = new Provider();
        $provider->name = 'sisterStore';
        $provider->description = 'Tienda de stickers, llaveros, y productos personalizados de fandoms.';
        $provider->save();

        $provider = new Provider();
        $provider->name = 'pepisBazar';
        $provider->description = 'Tienda de diseños propios plasmados en productos.';
        $provider->save();

        $provider = new Provider();
        $provider->name = 'Hamarumis';
        $provider->description = 'Friki shop';
        $provider->save();
    }
}
