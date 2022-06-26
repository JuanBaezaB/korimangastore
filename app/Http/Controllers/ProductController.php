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
use Illuminate\Support\Facades\DB;
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
        return $data->only([
            'name',
            'description',
            'price',
            'status',
            'provider_id',
            'category_id'
        ]);
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

    static protected function makeExcludeUnlessCategoryId($request, $id) {
        return 'exclude_unless:category_id,' . $id;
    }
    
    static protected function makeRules($request) {
        $mangaExcludeUnless = self::makeExcludeUnlessCategoryId($request, Product::TYPE_MANGA);
        $mangaRequiredIf = self::makeRequiredIfCategoryId($request, Product::TYPE_MANGA);


        $figureExcludeUnless = self::makeExcludeUnlessCategoryId($request, Product::TYPE_FIGURE);
        $figureRequiredIf = self::makeRequiredIfCategoryId($request, Product::TYPE_FIGURE);
        return [
            'name' => 'required|string|min:1|max:200',
            'price' => 'required|integer|min:0',
            'description' => 'max:2000',
            'provider_id' => 'nullable|exists:App\Models\Provider,id',
            'series' => 'array',
            'series.*' => 'exists:App\Models\Serie,id',
            'category_id' => 'required|exists:App\Models\Category,id',
            /* MANGA */
            'editorial_id' => [$mangaExcludeUnless, $mangaRequiredIf, 'exists:App\Models\Editorial,id'],
            'format_id' => [$mangaExcludeUnless, $mangaRequiredIf, 'exists:App\Models\Format,id'],
            'genres' => [$mangaExcludeUnless, 'nullable', 'array'],
            'genres.*' => [$mangaExcludeUnless, 'exists:App\Models\Genre,id'],
            'arts' => [$mangaExcludeUnless, 'nullable','array'],
            'arts.*' => [$mangaExcludeUnless, 'exists:App\Models\CreativePerson,id'],
            'stories' => [$mangaExcludeUnless, 'nullable','array'],
            'stories.*' => [$mangaExcludeUnless, 'exists:App\Models\CreativePerson,id'],
            /* FIGURE */
            'figure_type_id' => [$figureExcludeUnless, $figureRequiredIf, 'exists:App\Models\FigureType,id']
            
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
        
        $validator = Validator::make($request->all(), self::makeRules($request));
        $validator->validate();
        /*if ($validator->fails()) {
            dd($validator);
        }*/
        DB::beginTransaction();
        try {

            $datos = request()->except(['_token']);
            $datos = collect($datos);


            $datosProducto = self::collectProductData($datos);
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
            DB::commit();
        } catch(\Throwable $th) {
            DB::rollBack();
            throw $th;
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
        $validator = Validator::make($request->all(), self::makeRules($request));
        $validator->validate();

        $data = request()->except(['_token', '_method']);
        $data = collect($data);
        
        DB::beginTransaction();
        try {
            $categoryId = $data->get('category_id');

            $productData = $data->only([
                'name',
                'description',
                'price',
                'status',
                'provider_id'
            ]);
            $productData->put('category_id', $categoryId);

            $product = Product::findOrFail($id);
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
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
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
