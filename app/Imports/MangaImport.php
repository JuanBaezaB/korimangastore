<?php

namespace App\Imports;

use App\Models\Branch;
use App\Models\Product;
use App\Models\Category;
use App\Models\Provider;
use App\Models\Format;
use App\Models\Editorial;
use App\Models\Manga;
use App\Models\Genre;
use App\Models\Serie;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Throwable;
class MangaImport implements ToCollection, WithHeadingRow, SkipsOnError, WithValidation
{
    use Importable, SkipsErrors;
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection){
        foreach ($collection as $row) {
            // Ingresar producto
            $category = Category::firstWhere('name', 'Manga');
            $provider = Provider::firstWhere('name', trim($row['proveedor']));
            if ($provider == null && trim($row['proveedor']) != null) {
                $provider = new Provider();
                $provider->name = $row['proveedor'];
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

                // Ingresar manga
                $editorial = Editorial::firstWhere('name', trim($row['editorial']));
                if ($editorial == null && trim($row['editorial']) != null) {
                    $editorial = new Editorial();
                    $editorial->name = trim($row['editorial']);
                    $editorial->save();
                }

                $format = Format::firstWhere('name', trim($row['formato']));
                if ($format == null && $row['formato'] != null) {
                    $format = new Format();
                    $format->name = trim($row['formato']);
                    $format->save();
                }

                $manga = Manga::create([
                    'editorial_id' => isset($editorial->id) ? $editorial->id : null,
                    'format_id' => isset($format->id) ? $format->id : null,
                ]);

                $manga->product()->save($product);
                $genres = explode(";", $row['genero']);
                if ($genres != null) {
                    foreach ($genres as $genre) {
                        $genre = trim($genre);
                        if (!empty($genre)) {
                            $genero = Genre::firstWhere('name', $genre);
                            if ($genero == null) {
                                $genero = new Genre();
                                $genero->name = $genre;
                                $genero->save();
                            }
                            $manga->genres()->attach($genero);
                        }
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

            } else {
                $product = Product::firstWhere('code', trim($row['codigo']));
                if ($product =! null) {
                    $product = Product::where('id',$product->id)->update([
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
                            array_push($series_id, $serie->id);
                        }
                    }$product->series()->sync( $series_id);

                    // Ingresar manga
                    $editorial = Editorial::firstWhere('name', trim($row['editorial']));
                    if ($editorial == null && trim($row['editorial']) != null) {
                        $editorial = new Editorial();
                        $editorial->name = trim($row['editorial']);
                        $editorial->save();
                    }
        
                    $format = Format::firstWhere('name', trim($row['formato']));
                    if ($format == null && $row['formato'] != null) {
                        $format = new Format();
                        $format->name = trim($row['formato']);
                        $format->save();
                    }
                    
                    $manga = $product->productable;
                    $manga->update([
                        'editorial_id' => isset($editorial->id) ? $editorial->id : null,
                        'format_id' => isset($format->id) ? $format->id : null,
                    ]);

                    $genres_id = [];
                    $genres = explode(";", $row['genero']);
                    if ($genres != null) {
                        foreach ($genres as $genre) {
                            $genre = trim($genre);
                            if (!empty($genre)) {
                                $genero = Genre::firstWhere('name', $genre);
                                if ($genero == null) {
                                    $genero = new Genre();
                                    $genero->name = $genre;
                                    $genero->save();
                                }
                                array_push($genres_id, $genero->id);
                            }
                        }
                    }$manga->genres()->sync($genres_id);
                    
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
        
        
                    // Ingresar manga
                    $editorial = Editorial::firstWhere('name', trim($row['editorial']));
                    if ($editorial == null && trim($row['editorial']) != null) {
                        $editorial = new Editorial();
                        $editorial->name = trim($row['editorial']);
                        $editorial->save();
                    }
        
                    $format = Format::firstWhere('name', trim($row['formato']));
                    if ($format == null && $row['formato'] != null) {
                        $format = new Format();
                        $format->name = trim($row['formato']);
                        $format->save();
                    }
        
                    $manga = Manga::create([
                        'editorial_id' => isset($editorial->id) ? $editorial->id : null,
                        'format_id' => isset($format->id) ? $format->id : null,
                    ]);
        
                    $manga->product()->save($product);
                    $genres = explode(";", $row['genero']);
                    if ($genres != null) {
                        foreach ($genres as $genre) {
                            $genre = trim($genre);
                            if (!empty($genre)) {
                                $genero = Genre::firstWhere('name', $genre);
                                if ($genero == null) {
                                    $genero = new Genre();
                                    $genero->name = $genre;
                                    $genero->save();
                                }
                                $manga->genres()->attach($genero);
                            }
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
    }
    public function rules(): array {
        return [
            "*.codigo" => ['required', 'string', 'max:13'],
            "*.nombre" => ['required', 'string', 'max:255'],
            "*.decripcion" => ['nullable', 'string', 'max:2000'],
            "*.precio" => ['required','numeric','min:0','max:1000000'],
            "*.proveedor" => ['nullable'],
            "*.serie" => ['required'],
            "*.editorial" => ['required'],
            "*.formato" => ['nullable'],
            "*.genero" => ['nullable'],
            "*.sucursal" => ['required'],
            "*.stock" => ['required'],
        ];
    }
}
