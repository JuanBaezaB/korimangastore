<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\User;
use App\Models\Product;
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


        $sales = Sale::all();
        $cUsers  = User::count();
        $cSales = Sale::count();
        $cProducts = Product::count();


        //Ganancias y porcentaje
        $dateFrom = Carbon::now()->subDays(30);
        $dateTo = Carbon::now();
        $monthly = Sale::where('created_at', '>=', $dateFrom)->where('created_at', '<=', $dateTo)->count();

        $previousDateFrom = Carbon::now()->subDays(60);
        $previousDateTo = Carbon::now()->subDays(31);
        $previousMonthly = Sale::where('created_at', '>=', $dateFrom)->where('created_at', '<=', $dateTo)->count();

        if ($previousMonthly < $monthly) {
            if ($previousMonthly > 0) {
                $pEarnings = $monthly - $previousMonthly;
                $pSales = $pEarnings / $previousMonthly * 100; //incremento de porcentaje
                $mark   ="+";
            } else {
                $percent = 100; //incremento de porcentaje
            }
        } else {
            $mark="-";
            $Earnings = $previousMonthly - $monthly;
            $pEarnings = $Earnings / $previousMonthly * 100; //disminucion de porcentaje
        }

        //Ultimos 30 usuarios
        /*
        $lastThirtyUsers = User::select('id')
            ->where('name', 'user')
            ->where('created_at', '>', now()->subDays(30)->endOfDay())
            ->all();
            */
        $salesMonth = [];
        
            $salesMonth['Enero'] =  Sale::whereMonth('created_at', '=', '01')->whereYear('created_at', '=', date("Y"))->count('id');
            $salesMonth['Febrero'] =  Sale::whereMonth('created_at', '=', '02')->whereYear('created_at', '=', date("Y"))->count('id');
            $salesMonth['Marzo'] =  Sale::whereMonth('created_at', '=', '03')->whereYear('created_at', '=', date("Y"))->count('id');
            $salesMonth['Abril'] =  Sale::whereMonth('created_at', '=', '04')->whereYear('created_at', '=', date("Y"))->count('id');
            $salesMonth['Mayo'] =  Sale::whereMonth('created_at', '=', '05')->whereYear('created_at', '=', date("Y"))->count('id');
            $salesMonth['Junio'] =  Sale::whereMonth('created_at', '=', '06')->whereYear('created_at', '=', date("Y"))->count('id');
            $salesMonth['Julio'] =  Sale::whereMonth('created_at', '=', '07')->whereYear('created_at', '=', date("Y"))->count('id');
            $salesMonth['Agosto'] =  Sale::whereMonth('created_at', '=', '08')->whereYear('created_at', '=', date("Y"))->count('id');
            $salesMonth['Septiembre'] =  Sale::whereMonth('created_at', '=', '09')->whereYear('created_at', '=', date("Y"))->count('id');
            $salesMonth['Octubre'] =  Sale::whereMonth('created_at', '=', '10')->whereYear('created_at', '=', date("Y"))->count('id');
            $salesMonth['Noviembre'] =  Sale::whereMonth('created_at', '=', '11')->whereYear('created_at', '=', date("Y"))->count('id');
            $salesMonth['Diciembre'] =  Sale::whereMonth('created_at', '=', '12')->whereYear('created_at', '=', date("Y"))->count('id');
        

        

        
        return view('admin.basic_management.internal_configuration.sale.graphic.graphic', compact('salesMonth','mark', 'cUsers', 'cSales', 'pEarnings', 'Earnings', 'cProducts', 'sales'));
    }
}
