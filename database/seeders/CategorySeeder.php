<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->name = 'Manga';
        $category->save();

        $category = new Category();
        $category->name = 'Figura';
        $category->save();

        $category = new Category();
        $category->name = 'Ropa';
        $category->save();
    }
}
