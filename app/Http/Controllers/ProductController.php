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
            $product = Product::all();
        } catch (\Throwable $th) {
            return response()->json($product);
        }
        
        return response()->view('admin.product_management.list_product', compact('product'));
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
            request()->validate($validation_rules);
            $datos = request()->except(['_token']);
            $datos = collect($datos);

            $categoryId = $datos->get('product_type');
            $category = Category::findOrFail($categoryId);

            $datosProducto = $datos->only([
                'name',
                'description',
                'price',
                'status',
                'provider_id'
            ]);
            $datosProducto->put('category_id', $categoryId);

            $product = Product::create($datosProducto->toArray());
            $product->series()->attach($datos['series']);
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

                $manga->genres()->sync($datos['genres']);

                $artists = [];
                foreach ($datos['arts'] as $artBy) {
                    $artists[$artBy] = [ 'creative_type' => 'art' ];
                }
                foreach ($datos['stories'] as $storyBy) {
                    $crType = 'story';
                    if (array_key_exists($storyBy, $artists)) {
                        $crType = 'both';
                    }
                    $artists[$storyBy] = [ 'creative_type' => $crType ];
                }

                $manga->creativePeople()->sync($artists);

                $manga->product()->save($product);
            }

        } catch(\Throwable $th) {
            return response()->json([
                'text' => $th->getMessage()
            ]);
        }
        return redirect()->route('lista_producto')
            ->with('success', 'updated');
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
    }
}
