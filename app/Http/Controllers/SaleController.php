<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }

    public function charts()
    {




        /*
        $mes = substr($hoy, 0, 7);
        $ventames = DB::table('ventas')->where('created_at', '>=', $mes . '-01')->where('created_at', '<=', $mes . '-31')->sum('valor');

        $year = substr($hoy, 0, 4);
        $ventanual = DB::table('ventas')->where('created_at', '>=', $year . '-01-01')->where('created_at', '<=', $year . '-12-31')->sum('valor');
*/

        $date = Carbon::now();
        $year = substr($date, 0, 4);
        $sales = Sale::all();
        
        foreach($sales as $sale)
        {
            $sales = $sale->id;
        }
        
/*
        foreach ($sales as $sale) {
            $salesMonth['Enero'] =  DB::table('sale')->where('created_at', '>=', $year . '-01-01')->where('created_at', '<=', $year . '-01-31')->sum('id');
            $salesMonth['Febrero'] =  DB::table('sale')->where('created_at', '>=', $year . '-02-01')->where('created_at', '<=', $year . '-02-28')->sum('id');
            $salesMonth['Marzo'] =  DB::table('sale')->where('created_at', '>=', $year . '-03-01')->where('created_at', '<=', $year . '-03-31')->sum('id');
            $salesMonth['Abril'] =  DB::table('sale')->where('created_at', '>=', $year . '-04-01')->where('created_at', '<=', $year . '-04-30')->sum('id');
            $salesMonth['Mayo'] =  DB::table('sale')->where('created_at', '>=', $year . '-05-01')->where('created_at', '<=', $year . '-05-31')->sum('id');
            $salesMonth['Junio'] =  DB::table('sale')->where('created_at', '>=', $year . '-06-01')->where('created_at', '<=', $year . '-06-30')->sum('id');
            $salesMonth['Julio'] =  DB::table('sale')->where('created_at', '>=', $year . '-07-01')->where('created_at', '<=', $year . '-07-31')->sum('id');
            $salesMonth['Agosto'] =  DB::table('sale')->where('created_at', '>=', $year . '-08-01')->where('created_at', '<=', $year . '-08-31')->sum('id');
            $salesMonth['Septiembre'] =  DB::table('sale')->where('created_at', '>=', $year . '-09-01')->where('created_at', '<=', $year . '-09-30')->sum('id');
            $salesMonth['Octubre'] =  DB::table('sale')->where('created_at', '>=', $year . '-10-01')->where('created_at', '<=', $year . '-10-31')->sum('id');
            $salesMonth['Noviembre'] =  DB::table('sale')->where('created_at', '>=', $year . '-11-01')->where('created_at', '<=', $year . '-11-30')->sum('id');
            $salesMonth['Diciembre'] =  DB::table('sale')->where('created_at', '>=', $year . '-12-01')->where('created_at', '<=', $year . '-12-31')->sum('id');
        }*/

        return view('admin.basic_management.internal_configuration.sale.graphic.graphic', compact('sales'));
    }
}
