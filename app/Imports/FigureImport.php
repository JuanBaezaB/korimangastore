<?php

namespace App\Imports;

use App\Models\Branch;
use App\Models\Product;
use App\Models\Category;
use App\Models\Provider;
use App\Models\Serie;
use App\Models\FigureType;
use App\Models\Figure;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Throwable;

class FigureImport implements ToCollection, WithHeadingRow, SkipsOnError, WithValidation
{

    use Importable, SkipsErrors;
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            // Ingresar producto
            $category = Category::firstWhere('name', 'Figura');
            $provider = Provider::firstWhere('name', trim($row['proveedor']));
            if ($provider == null && trim($row['proveedor']) != null) {
                $provider = new Provider();
                $provider->name = trim($row['proveedor']);
                $provider->save();
            }

            if(trim($row['codigo']) == "-"){
                $code = 'KORI' . Str::random(9);
                while(count(Product::where('code', $code)->get()) != 0) {
                    $code = 'KORI' . Str::random(9);
                }
                $product = Product::create([
                    'name' => trim($row['nombre']),
                    'code'=> $code,
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

                $figuretype = FigureType::firstWhere('name', trim($row['tipo']));
                if ($figuretype == null && trim($row['tipo']) != null) {
                    $figuretype = new FigureType();
                    $figuretype->name = trim($row['tipo']);
                    $figuretype->save();
                }
                $figure = Figure::create([
                    'figure_type_id' => isset($figuretype->id) ? $figuretype->id : null,
                ]);
                $figure->product()->save($product);

               // Ingresar stock
               $branches = explode(";", $row['sucursal']);
               $stocks = explode(";", $row['stock']);
               if(sizeof($branches) != sizeof($branches)) {
                   throw new \Exception("the number of branches is different from the number of stocks");
               }else{
                   for ($i = 0; $i < sizeof($branches); $i++) {
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
            }else{
                $product = Product::firstWhere('code', trim($row['codigo']));
                if ($product != null) {
                    $product->update([
                        'name' => trim($row['nombre']),
                        'description' => trim($row['descripcion']),
                        'price' => trim($row['precio']),
                        'category_id' => $category->id,
                        'provider_id' => isset($provider->id) ? $provider->id : null,
                    ]);
                    $series = explode(";", $row['serie']);
                    $series_id = [];
                    foreach ($series as $serie_manga) {
                        $serie_manga = trim($serie_manga);
                        if (!empty($serie_manga)) {
                            $serie = Serie::firstWhere('name', $serie_manga);
                            if ($serie == null) {
                                $serie = new Serie();
                                $serie->name = $serie_manga;
                                $serie->save();
                            }
                            array_push($series_id,$serie->id);
                        }
                    }
                    $product->series()->sync($series_id);

                    $figuretype = FigureType::firstWhere('name', trim($row['tipo']));
                    if ($figuretype == null && trim($row['tipo']) != null) {
                        $figuretype = new FigureType();
                        $figuretype->name = trim($row['tipo']);
                        $figuretype->save();
                    }
                    $figure = $product->productable;
                    $figure->update([
                        'figure_type_id' => isset($figuretype->id) ? $figuretype->id : null,
                    ]);

                    // Ingresar stock
                    $branches = explode(";", $row['sucursal']);
                    $stocks = explode(";", $row['stock']);
                    if(sizeof($branches) != sizeof($branches)) {
                        throw new \Exception("the number of branches is different from the number of stocks");
                    }else{
                        for ($i = 0; $i < sizeof($branches); $i++) {
                            $branches[$i] = trim($branches[$i]);
                            if (!empty($branches[$i])) {
                                $branch = Branch::firstWhere('name', $branches[$i]);
                                if ($branch == null) {
                                    $branch = new Branch();
                                    $branch->name = $branches[$i];
                                    $branch->save();
                                }
                                $stock = intval($stocks[$i]);
                                $product->changeStock($branch->id, $stock);
                            }
                        }
                    }
                }else{
                    $product = Product::create([
                        'name' => trim($row['nombre']),
                        'code'=>trim($row['codigo']),
                        'description' => trim($row['descripcion']),
                        'price' => trim($row['precio']),
                        'category_id' => $category->id,
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

                    $figuretype = FigureType::firstWhere('name', trim($row['tipo']));
                    if ($figuretype == null && trim($row['tipo']) != null) {
                        $figuretype = new FigureType();
                        $figuretype->name = trim($row['tipo']);
                        $figuretype->save();
                    }
                    $figure = Figure::create([
                        'figure_type_id' => isset($figuretype->id) ? $figuretype->id : null,
                    ]);
                    $figure->product()->save($product);


                    // Ingresar stock
                    $branches = explode(";", $row['sucursal']);
                    $stocks = explode(";", $row['stock']);
                    if(sizeof($branches) != sizeof($branches)) {
                        throw new \Exception("the number of branches is different from the number of stocks");
                    }else{
                        for ($i = 0; $i < sizeof($branches); $i++) {
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
        }
    }
    public function rules(): array {
        return [
            "*.nombre" => ['required', 'string', 'max:255'],
            "*.decripcion" => ['nullable', 'string', 'max:2000'],
            "*.precio" => ['required','numeric','min:0','max:1000000'],
            "*.proveedor" => ['nullable'],
            "*.serie" => ['required'],
            "*.tipo" => ['required'],
            "*.sucursal" => ['nullable'],
            "*.stock" => ['nullable'],
        ];
    }
}
