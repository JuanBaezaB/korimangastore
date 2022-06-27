<?php

namespace App\Imports;

use App\Models\Branch;
use App\Models\Product;
use App\Models\Category;
use App\Models\Provider;
use App\Models\Serie;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Validation\Rule;

class ProductImport implements ToCollection, WithHeadingRow{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection){
        foreach ($collection as $row) {
            // Ingresar producto
            $category = Category::firstWhere('name', trim($row['categoria']));
            if ($category == null && trim($row['categoria']) != null) {
                $category = new Category();
                $category->name = trim($row['categoria']);
                $category->save();
            }
            $provider = Provider::firstWhere('name', trim($row['proveedor']));
            if ($provider == null && trim($row['proveedor']) != null) {
                $provider = new Provider();
                $provider->name = trim($row['proveedor']);
                $provider->save();
            }
            $product = Product::create([
                'name' => trim($row['nombre']),
                'description' => trim($row['descripcion']),
                'price' => trim($row['precio']),
                'category_id' => isset($category->id) ? $category->id : null,
                'provider_id' => isset($provider->id) ? $provider->id : null,
            ]);
            $series = explode(";", $row['serie']);
            foreach ($series as $serie_manga) {
                $serie_manga = trim($serie_manga);
                if (!empty($serie_manga)) {
                    $serie = Serie::firstWhere('name', $serie_manga);
                    if ($serie == null) {
                        $serie = new Serie();
                        $serie->name = $serie_manga;
                        $serie->save();
                    }
                    $product->series()->attach($serie);
                }
            }

            // Ingresar stock
            $branches = explode(";", $row['sucursal']);
            $stocks = explode(";", $row['stock']);
            for ($i = 0; $i < count($branches); $i++) {
                $branches[$i] = trim($branches[$i]);
                if (!empty($branches[$i])) {
                    $branch = Branch::firstWhere('name', $branches[$i]);
                    if ($branch == null) {
                        $branch = new Branch();
                        $branch->name = $branches[$i];
                        $branch->save();
                    }
                    $stock = intval($stocks[$i]);
                    $product->branches()->attach($branch, ['stock' => $stock]);
                }
            }
        }
    }
}
