<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CreativePerson;
use App\Models\Editorial;
use App\Models\FigureType;
use App\Models\Format;
use App\Models\Genre;
use App\Models\Product;
use App\Models\Provider;
use App\Models\Serie;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'DESC')->limit(4)->get();
        $providers = Provider::all();
        $series = Serie::all();
        $publishers = Editorial::all();
        $genres = Genre::all();
        $formats = Format::all();
        $creatives = CreativePerson::all();
        $categories = Category::all();
        $figure_types = FigureType::all();
        return response()->view(
            'public.home',
            compact(
                'products',
                'providers',
                'series',
                'publishers',
                'genres',
                'formats',
                'creatives',
                'categories',
                'figure_types',
            )
        );
    }

    public function showProduct($id)
    {
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
        } catch (\Throwable $th) {
            return response()->json($th);
        }
        return response()->view(
            'public.show-product',
            compact(
                'product',
                'providers',
                'series',
                'publishers',
                'genres',
                'formats',
                'creatives',
                'categories',
                'figure_types',
            )
        );
    }
}
