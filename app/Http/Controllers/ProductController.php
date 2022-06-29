<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CreativePerson;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Provider;
use App\Models\Serie;
use App\Models\Editorial;
use App\Models\Genre;
use App\Models\Format;
use App\Models\Manga;
use App\Models\FigureType;
use App\Models\Figure;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        try {
            $products = Product::all();
        } catch (\Throwable $th) {
            return response()->json($products);
        }
        
        return response()->view('admin.product_management.list_product', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        try {
            $providers = Provider::all();
            $series = Serie::all();
            $publishers = Editorial::all();
            $genres = Genre::all();
            $formats = Format::all();
            $creatives = CreativePerson::all();
            $categories = Category::all();
            $figure_types = FigureType::all();

            $the_compact = compact(
                'providers', 'series', 'publishers', 
                'genres', 'formats', 'creatives', 
                'figure_types',
                'categories'
            );
        } catch (\Throwable $th) {
            return response()->json($th);
        }

        return response()->view('admin.product_management.add_product', $the_compact);
    }

    /**
     * make an array to pass to Product::create or Product's update method
     * 
     * @param \Illuminate\Support\Collection $data
     * @return \Illuminate\Support\Collection
     */
    protected static function collectProductData($data) {
        $ret = collect($data->only([
            'name',
            'description',
            'price',
            'status',
            'provider_id',
            'category_id',
            'has_p_code',
            'p_code'
        ]));

        $ret->put('has_code', $ret->pull('has_p_code') == 'on');
        $ret->put('code', $ret->pull('p_code'));

        return $ret;
    }

    /**
     * make an array to pass to Manga::create or Manga's update method
     * 
     * @param \Illuminate\Support\Collection $data
     * @return \Illuminate\Support\Collection
     */
    protected static function collectMangaData($data) {
        return $data->only([
            'editorial_id',
            'format_id'
        ]);
    }

    protected static function collectFigureData($data) {
        return $data->only([
            'figure_type_id'
        ]);
    }

    /**
     * make an array to pass to Manga->creativePeople()->sync
     * 
     * @param array $illustrators
     * @param array $writers
     * @return \Illuminate\Support\Collection
     */
    protected static function accumulateArtists($illustrators, $writers) {

        $artists = [];
        foreach ($illustrators as $artBy) {
            $artists[$artBy] = [ 'creative_type' => 'art' ];
        }
        foreach ($writers as $storyBy) {
            $crType = 'story';
            if (array_key_exists($storyBy, $artists)) {
                $crType = 'both';
            }
            $artists[$storyBy] = [ 'creative_type' => $crType ];
        }
        return $artists;
    }

    static protected function makeRequiredIfCategoryId($request, $id) {
        return Rule::requiredIf(function () use ($request, $id) {
            return $request->get('category_id') == $id;
        });
    }

    static protected function makeExcludeIfCategoryId($request, $id) {
        return 'exclude_if:category_id,' . $id;
    }
    
    static protected function makeRules($request) {
        $mangaExcludeIf = self::makeExcludeIfCategoryId($request, Product::TYPE_MANGA);
        $mangaRequiredIf = self::makeRequiredIfCategoryId($request, Product::TYPE_MANGA);


        $figureExcludeIf = self::makeExcludeIfCategoryId($request, Product::TYPE_FIGURE);
        $figureRequiredIf = self::makeRequiredIfCategoryId($request, Product::TYPE_FIGURE);
        return [
            'name' => 'required|string|lt:200',
            'price' => 'required|integer|gt:0',
            'p_code' => 'required_if:has_p_code,on|string|max:13',
            'description' => 'lt:2000',
            'provider_id' => 'nullable|exists:App\Models\Provider,id',
            'series' => 'array',
            'series.*' => 'exists:App\Models\Serie,id',
            'category_id' => 'required|exists:App\Models\Category,id', /* TODO: deberia ser cambiado en formulario */
            /* MANGA */
            'editorial_id' => [$mangaExcludeIf, $mangaRequiredIf, 'exists:App\Models\Editorial,id'],
            'format_id' => [$mangaExcludeIf, $mangaRequiredIf, 'exists:App\Models\Format,id'],
            'genres' => [$mangaExcludeIf, 'nullable', 'array'],
            'genres.*' => [$mangaExcludeIf, 'exists:App\Models\Genre,id'],
            'arts' => [$mangaExcludeIf, 'nullable','array'],
            'arts.*' => [$mangaExcludeIf, 'exists:App\Models\CreativePerson,id'],
            'stories' => [$mangaExcludeIf, 'nullable','array'],
            'stories.*' => [$mangaExcludeIf, 'exists:App\Models\CreativePerson,id'],
            /* FIGURE */
            'figure_type_id' => [$figureExcludeIf, $figureRequiredIf, 'exists:App\Models\FigureType,id']
            
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        /*
        $validator = Validator::make($request->all(), self::makeRules($request));
        
        if ($validator->fails()) {
            dd($validator);
        }*/
        try {

            $datos = request()->except(['_token']);
            $datos = collect($datos);


            $datosProducto = self::collectProductData($datos);
            $has_code = $datosProducto->pull('has_code');
            if ($has_code) {
            } else {
                $datosProducto->pull('code');
                $code = 'KORI' . Str::random(9);
                while(count(Product::where('code', $code)->get()) != 0) {
                    $code = 'KORI' . Str::random(9);
                }
                $datosProducto->put('code', $code);
            }

            $category = Category::findOrFail($datosProducto->get('category_id'));

            $product = Product::create($datosProducto->toArray());
            $series = isset($datos['series']) ? $datos['series'] : [];
            $product->series()->sync($series);
            //$series = Serie::findMany($datos['series']);

            if ($category->name == 'Manga') {
                /*
                $genres = Serie::findMany($datos['genres']);
                $arts = CreativePerson::findMany($datos['arts']);
                $stories = CreativePerson::findMany($datos['stories']);
                */
                $datosManga = $datos->only([
                    'editorial_id',
                    'format_id'
                ]);
                $manga = Manga::create($datosManga->toArray());

                $genres = isset($datos['genres']) ? $datos['genres'] : [];
                $manga->genres()->sync($genres);

                $artists = self::accumulateArtists($datos['arts'], $datos['stories']);
                $manga->creativePeople()->sync($artists);

                $manga->product()->save($product);
            } else if ($category->name == 'Figura') {
                $figureData = self::collectFigureData($datos);
                $figure = Figure::create($figureData->toArray());
                $figure->type()->associate($figureData->get('figure_type_id'));
                $figure->product()->save($product);
                $figure->save();

            }

        } catch(\Throwable $th) {
            dd($th);
        }
        return redirect()->route('product.list')
            ->with('success', 'created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        try {
            $product = Product::findOrFail($id);
            $providers = Provider::all();
            $series = Serie::all();
            $publishers = Editorial::all();
            $genres = Genre::all();
            $formats = Format::all();
            $creatives = CreativePerson::all();
            $categories = Category::all();
            $figure_types = FigureType::all();
            $is_edit = true;
            $the_compact = compact(
                'product',
                'providers', 'series', 'publishers', 
                'genres', 'formats', 'creatives', 
                'categories',
                'figure_types',
                'is_edit'
            );
        } catch (\Throwable $th) {
            return response()->json($th);
        }

        return response()->view('admin.product_management.add_product', $the_compact);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = request()->except(['_token', '_method']);
        $data = collect($data);
        
        try {
            // TODO: validacion
            $categoryId = $data->get('category_id');

            $productData = self::collectProductData($data);

            $product = Product::findOrFail($id);

            $oldCode = $product->code;

            $has_code = $productData->pull('has_code');
            if ($has_code) {
                $code = $productData->get('code');
                if ($code != $oldCode) {
                    $conflicts = Product::where('code', $code)->get();
                    if (count($conflicts) > 0) {
                        // change to utilize custom exception that reports conflicts
                        // guide: https://laravel.com/docs/8.x/errors
                        // throw new ConflictFieldException('code', $code, $conflicts);
                        throw new \Exception('Code already used');
                    }
                }

            } else {
                if (!Str::startsWith($oldCode, 'KORI')) {
                    $code = 'KORI' . Str::random(9);
                    while(count(Product::where('code', $code)->get()) != 0) {
                        $code = 'KORI' . Str::random(9);
                    }
                    $productData->put('code', $code);
                }
            }

            $oldCategory = $product->category;
            $oldProductable = $product->productable;
            $category = Category::findOrFail($productData->get('category_id'));
            
            $series = $data->get('series', []);
            $product->series()->sync( $series);
            $product->update($productData->toArray());
            $product->save();
            
            $hasCategoryChanged = $category->id != $oldCategory->id;
            if ($hasCategoryChanged) {
                $product->category()->associate($categoryId);

                if (!empty($oldProductable)) {
                    $oldProductable->delete();
                }
            }

            if ($category->name == 'Manga') {
                $manga = $oldProductable;
                $dataManga = self::collectMangaData($data);
                if ($hasCategoryChanged || empty($manga)) {
                    $manga = Manga::create($dataManga->toArray());
                    $manga->product()->save($product);
                    
                } else {
                    $manga->update($dataManga->toArray());
                    $manga->save();
                }

                $artists = self::accumulateArtists($data->get('arts'), $data->get('stories'));
                $manga->creativePeople()->sync($artists);
                $genres = $data->get('genres', []);
                $manga->genres()->sync($genres);

            } else if ($category->name == 'Figura') {

                $figure = $oldProductable;
                $figureData = self::collectFigureData($data);

                if ($hasCategoryChanged || empty($manga)) {
                    $figure = Figure::create($figureData->toArray());
                    $figure->product()->save($product);

                } else {
                    $figure->update($figureData->toArray());
                    $figure->save();
                }

                $figure->type()->associate($figureData->get('figure_type_id'));
                $figure->save();

            }

        } catch (\Throwable $th) {
            return response()->json([
                'text' => $th->getMessage()
            ]);
        }

        return redirect()->route('product.list')
            ->with('success', 'updated');
        return response()->json($data->toArray());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::findOrFail($id);

        if (!empty($product->productable)) {
            $product->productable->delete();
        }
        $product->delete();

        return redirect()->route('product.list')
        ->with('success', 'deleted');
    }


    public function search(Request $request) {
        $ret = [];
        $term = $request->get('term');
        $results = Product::orWhere('name', 'LIKE', '%' . $term . '%')
        ->get()
        ->map(function ($d) {
            $d->text = $d->name;
            return $d;
        })
        ->toArray();

        $ret['results'] = $results;
        return response()->json($ret);
    }
}
