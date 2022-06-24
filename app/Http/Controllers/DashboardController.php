<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Sale;
use App\Models\User;
use Carbon\Carbon;
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
        $cSales = Sale::count();
        $users = User::all();
        $cUsers  = User::count();
        $products = Product::all();
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

        //Devuelve porcentajes de mes actual vs mes anterior
        $percentListSales = DashboardController::retPercent($monthlySales, $previousMonthlySales);
        $percentListUsers = DashboardController::retPercent($monthlyUsers, $previousMonthlyUser);

        //usuarios y ventas por mes (Graficos)
        $salesMonthParam = DashboardController::salesMonth('Sales');
        $usersMonthParam = DashboardController::salesMonth('Users');

        //Join entre tablas sales y product_id para insertar en tabla
        $coincidence = DB::table('product_sale')
            ->rightJoin('products', 'products.id', '=', 'product_sale.product_id')
            ->select('category_id', 'name', 'products.price')
            ->get();
        
        $categories = Category::select('name');

        Sale::where('created_at', '>=', $dateFrom)->where('created_at', '<=', $dateTo)->count();

        //esta consulta deberia ir en el 
        $productSales = DB::table('product_sale')
            ->rightJoin('products', 'products.id', '=', 'product_sale.product_id')
            ->select('category_id', 'products.price')
            ->get();


        //necesito llenar un arreglo con los tipos de categorias y despues sumar las categorias para entregar un arreglo en el compact 
        $list_product = [];


        function entregaCategoria($products)
        {
            foreach ($products as $product) {
                $list_product['name'] = $product->name;
                $list_product['category_name'] = $product->category->name;
                $list_product['price'] = $product->price;
            }
            return $list_product;
        }


        /*
        $list_category = [];
        
        for ($j=0; $j < sizeof($categories); $j++) { 
            $list_category[] = $categories->;
        }

        for ($i = 0; $i < sizeof($coincidence); $i++) {
            
            
        }*/



        return view(
            'admin.dashboard.dashboard',
            compact(
                'salesMonthParam',
                'usersMonthParam',
                'cUsers',
                'cSales',
                'cProducts',
                'sales',
                'percentListUsers',
                'percentListSales',
                'products',
                'productSales',
                'users'
            )
        );
    }

    function retPercent($monthly, $previousMonthly)
    {

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

    function salesMonth($param)
    {
        if ($param == 'Sales') {
            $prueba = new Sale();
        } else {
            $prueba = new User();
        }

        $salesMonth['Enero'] =  $prueba::whereMonth('created_at', '=', '01')->whereYear('created_at', '=', date("Y"))->count('id');
        $salesMonth['Febrero'] =  $prueba::whereMonth('created_at', '=', '02')->whereYear('created_at', '=', date("Y"))->count('id');
        $salesMonth['Marzo'] =  $prueba::whereMonth('created_at', '=', '03')->whereYear('created_at', '=', date("Y"))->count('id');
        $salesMonth['Abril'] =  $prueba::whereMonth('created_at', '=', '04')->whereYear('created_at', '=', date("Y"))->count('id');
        $salesMonth['Mayo'] =  $prueba::whereMonth('created_at', '=', '05')->whereYear('created_at', '=', date("Y"))->count('id');
        $salesMonth['Junio'] =  $prueba::whereMonth('created_at', '=', '06')->whereYear('created_at', '=', date("Y"))->count('id');
        $salesMonth['Julio'] =  $prueba::whereMonth('created_at', '=', '07')->whereYear('created_at', '=', date("Y"))->count('id');
        $salesMonth['Agosto'] =  $prueba::whereMonth('created_at', '=', '08')->whereYear('created_at', '=', date("Y"))->count('id');
        $salesMonth['Septiembre'] =  $prueba::whereMonth('created_at', '=', '09')->whereYear('created_at', '=', date("Y"))->count('id');
        $salesMonth['Octubre'] =  $prueba::whereMonth('created_at', '=', '10')->whereYear('created_at', '=', date("Y"))->count('id');
        $salesMonth['Noviembre'] =  $prueba::whereMonth('created_at', '=', '11')->whereYear('created_at', '=', date("Y"))->count('id');
        $salesMonth['Diciembre'] =  $prueba::whereMonth('created_at', '=', '12')->whereYear('created_at', '=', date("Y"))->count('id');

        return $salesMonth;
    }
}
