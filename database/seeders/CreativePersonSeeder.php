<?php

namespace Database\Seeders;

use App\Models\CreativePerson;
use Illuminate\Database\Seeder;

class CreativePersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $person = new CreativePerson();
        $person->name = 'ONE';
        $person->save();

        $person = new CreativePerson();
        $person->name = 'Hirohiko Araki';
        $person->save();
        
        $person = new CreativePerson();
        $person->name = 'Kentaro Miura';
        $person->save();
    }
}
