<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $salesMonth = [];
        $percentListSales = [];
        $percentListUser = [];

        $sales = Sale::all();
        $cUsers  = User::count();
        $cSales = Sale::count();
        $cProducts = Product::count();

        $dateFrom = Carbon::now()->subDays(30);
        $dateTo = Carbon::now();

        $previousDateFrom = Carbon::now()->subDays(60);
        $previousDateTo = Carbon::now()->subDays(31);

        //Variables function retPercent
        $monthlySales = Sale::where('created_at', '>=', $dateFrom)->where('created_at', '<=', $dateTo)->count();
        $previousMonthlySales = Sale::where('created_at', '>=', $previousDateFrom)->where('created_at', '<=', $previousDateTo)->count();

        $monthlyUsers = User::where('created_at', '>=', $dateFrom)->where('created_at', '<=', $dateTo)->count();
        $previousMonthlyUser = User::where('created_at', '>=', $previousDateFrom)->where('created_at', '<=', $previousDateTo)->count();




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


        function retPercent($monthly, $previousMonthly){

            $list_data = [];


            if ($previousMonthly < $monthly) {
                if ($previousMonthly > 0) {
                    $sustract = $monthly - $previousMonthly;
                    $list_data['mark']  = "+";
                    $list_data['percent'] = $sustract / $previousMonthly * 100; //incremento de porcentaje
                } else {
                    $list_data['mark']  = "+";
                    $list_data['percent'] = 100; //incremento de porcentaje

                }
            } else if ($previousMonthly > $monthly) {
                $sustract = $previousMonthly - $monthly;
                $list_data['mark'] = "-";
                $list_data['percent'] = $sustract / $previousMonthly * 100; //disminucion de porcentaje
            } else {
                $list_data['mark'] = " ";
                $list_data['percent'] = "0";
            }
            return $list_data;
        }
        $percentListSales = retPercent($monthlySales, $previousMonthlySales);
        $percentListUsers = retPercent($monthlyUsers, $previousMonthlyUser);

        $products = DB::table('product_sale')
            ->rightJoin('products', 'products.id', '=', 'product_sale.product_id')
            ->select('products.*', 'category_id', 'products.price')
            ->count();

        return view(
            'admin.dashboard.dashboard',
            compact(
                'salesMonth',
                'cUsers',
                'cSales',
                'cProducts',
                'sales',
                'percentListUsers',
                'percentListSales',
                'products'
            )
        );
    }
}
