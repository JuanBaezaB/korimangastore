<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Branch;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $branch = new Branch();
        $branch->name = 'Sucursal galería caracol';
        $branch->address ='Freire 522, Galería Caracol, 4to piso, Local 185.';
        $branch->save();
        
    }
}
