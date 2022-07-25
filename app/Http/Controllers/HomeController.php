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
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listMostSales = Product::select('products.*','countSales')
            ->leftjoin(DB::raw('(SELECT products.id as pds_id, SUM(amount) as countSales FROM products join product_sale on products.id = product_sale.product_id group by products.id) as countSales'), 'products.id','=','pds_id')
            ->orderBy('countSales', 'DESC')
            ->whereNotNull('countSales')
            ->limit(10)
            ->get();
        $products = Product::orderBy('created_at', 'DESC')->limit(10)->get();
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
                'listMostSales'
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
