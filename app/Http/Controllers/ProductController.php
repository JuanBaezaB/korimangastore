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

            $the_compact = compact(
                'providers', 'series', 'publishers', 
                'genres', 'formats', 'creatives', 
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
        $categoryId = $data->get('product_type');

        $retval = $data->only([
            'name',
            'description',
            'price',
            'status',
            'provider_id'
        ]);
        $retval->put('category_id', $categoryId);
        return $retval;
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
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        //return response()->json($request);
        $validation_rules = [
            'name' => 'required|string',
            'price' => 'required|integer|gt:0',
            /*
            'provider_id' => 'required|integer',
            'editorial_id' => 'required|integer'

            */
        ];
        try {
            // todo validacion
            request()->validate($validation_rules);
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
                $manga->genres()->sync();

                $artists = self::accumulateArtists($datos['arts'], $datos['stories']);
                $manga->creativePeople()->sync($artists);

                $manga->product()->save($product);
            }

        } catch(\Throwable $th) {
            return response()->json([
                'text' => $th->getMessage()
            ]);
        }
        return redirect()->route('lista_producto')
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
            $is_edit = true;
            $the_compact = compact(
                'product',
                'providers', 'series', 'publishers', 
                'genres', 'formats', 'creatives', 
                'categories',
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
            $categoryId = $data->get('product_type');

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

            }

        } catch (\Throwable $th) {
            return response()->json([
                'text' => $th->getMessage()
            ]);
        }

        return redirect()->route('lista_producto')
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

        return redirect()->route('lista_producto')
        ->with('success', 'deleted');
    }
}
