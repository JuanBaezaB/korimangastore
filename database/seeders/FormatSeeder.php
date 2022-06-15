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
        $format->name = 'Tankōbon';
        $format->description = ' El tamaño más habitual es de 13 x 18 cm aproximadamente.';
        $format->save();

        $format = new Format();
        $format->name = 'Aizoban';
        $format->description = 'Un aizoban es una edición de colección. Generalmente, es uno de los formatos del manga más caros y contienen objetos especiales o de edición limitada como tapas creadas específicamente para la edición, un tipo de papel particular para la tapa, un papel de mejor calidad para la impresión, entre otros.';
        $format->save();

        $format = new Format();
        $format->name = 'Kanzenban';
        $format->description = 'Este término también es utilizado para este tipo de ediciones especiales. Generalmente, es publicado en un formato A5 y contiene portadas especiales para cada episodio.';
        $format->save();

        $format = new Format();
        $format->name = 'Bunkoban';
        $format->description ='Una edición bunkoban se refiere a un tankobon impreso en un formato de novela de bolsillo. Generalmente tienen un tamaño A6 (10,5cm x 15cm aproximadamente) y son más gruesos que el tankobon.';
        $format->save();

        $format = new Format();
        $format->name = 'Wide-ban';
        $format->description ='También llamado waidoban, son unas ediciones A5 (15cm x 21cm aproximadamente) por lo que son más grandes que un tankobon.';
        $format->save();
    }
}
