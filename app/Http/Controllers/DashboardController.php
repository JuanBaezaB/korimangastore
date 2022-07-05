<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Category;
use App\Models\Product;
use App\Models\Sale;
use App\Models\User;
use Carbon\Carbon;
use Facade\FlareClient\Http\Response;
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
        $branches = Branch::all();

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

        //Datos grafico de torta



        //mostSelledProducts;

        //usuarios y ventas por mes (Graficos)
        $usersMonthParam = DashboardController::dataMonthUsers();

        //necesito llenar un arreglo con los tipos de categorias y despues sumar las categorias para entregar un arreglo en el compact 
        $mostSelledProducts = DashboardController::mostSelledProducts();


        return view(
            'admin.dashboard.dashboard',
            compact(
                
                'usersMonthParam',
                'cUsers',
                'cSales',
                'cProducts',
                'sales',
                'percentListUsers',
                'percentListSales',
                'products',
                'users',
                'branches',
                'mostSelledProducts',
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

    function dataMonthSales($branch)
    {
        $dataMonthsales['Enero'] =  Sale::whereMonth('created_at', '=', '01')->whereYear('created_at', '=', date("Y"))->where('branch_id', '=', $branch)->count('id');
        $dataMonthsales['Febrero'] =  Sale::whereMonth('created_at', '=', '02')->whereYear('created_at', '=', date("Y"))->where('branch_id', '=', $branch)->count('id');
        $dataMonthsales['Marzo'] =  Sale::whereMonth('created_at', '=', '03')->whereYear('created_at', '=', date("Y"))->where('branch_id', '=', $branch)->count('id');
        $dataMonthsales['Abril'] =  Sale::whereMonth('created_at', '=', '04')->whereYear('created_at', '=', date("Y"))->where('branch_id', '=', $branch)->count('id');
        $dataMonthsales['Mayo'] =  Sale::whereMonth('created_at', '=', '05')->whereYear('created_at', '=', date("Y"))->where('branch_id', '=', $branch)->count('id');
        $dataMonthsales['Junio'] =  Sale::whereMonth('created_at', '=', '06')->whereYear('created_at', '=', date("Y"))->where('branch_id', '=', $branch)->count('id');
        $dataMonthsales['Julio'] =  Sale::whereMonth('created_at', '=', '07')->whereYear('created_at', '=', date("Y"))->where('branch_id', '=', $branch)->count('id');
        $dataMonthsales['Agosto'] =  Sale::whereMonth('created_at', '=', '08')->whereYear('created_at', '=', date("Y"))->where('branch_id', '=', $branch)->count('id');
        $dataMonthsales['Septiembre'] =  Sale::whereMonth('created_at', '=', '09')->whereYear('created_at', '=', date("Y"))->where('branch_id', '=', $branch)->count('id');
        $dataMonthsales['Octubre'] =  Sale::whereMonth('created_at', '=', '10')->whereYear('created_at', '=', date("Y"))->where('branch_id', '=', $branch)->count('id');
        $dataMonthsales['Noviembre'] =  Sale::whereMonth('created_at', '=', '11')->whereYear('created_at', '=', date("Y"))->where('branch_id', '=', $branch)->count('id');
        $dataMonthsales['Diciembre'] =  Sale::whereMonth('created_at', '=', '12')->whereYear('created_at', '=', date("Y"))->where('branch_id', '=', $branch)->count('id');

        return response()->json([
            'sales' => $dataMonthsales,
        ]);
    }

    function dataMonthUsers()
    {
        $dataMonthUser['Enero'] =  User::whereMonth('created_at', '=', '01')->whereYear('created_at', '=', date("Y"))->count('id');
        $dataMonthUser['Febrero'] =  User::whereMonth('created_at', '=', '02')->whereYear('created_at', '=', date("Y"))->count('id');
        $dataMonthUser['Marzo'] =  User::whereMonth('created_at', '=', '03')->whereYear('created_at', '=', date("Y"))->count('id');
        $dataMonthUser['Abril'] =  User::whereMonth('created_at', '=', '04')->whereYear('created_at', '=', date("Y"))->count('id');
        $dataMonthUser['Mayo'] =  User::whereMonth('created_at', '=', '05')->whereYear('created_at', '=', date("Y"))->count('id');
        $dataMonthUser['Junio'] =  User::whereMonth('created_at', '=', '06')->whereYear('created_at', '=', date("Y"))->count('id');
        $dataMonthUser['Julio'] =  User::whereMonth('created_at', '=', '07')->whereYear('created_at', '=', date("Y"))->count('id');
        $dataMonthUser['Agosto'] =  User::whereMonth('created_at', '=', '08')->whereYear('created_at', '=', date("Y"))->count('id');
        $dataMonthUser['Septiembre'] =  User::whereMonth('created_at', '=', '09')->whereYear('created_at', '=', date("Y"))->count('id');
        $dataMonthUser['Octubre'] =  User::whereMonth('created_at', '=', '10')->whereYear('created_at', '=', date("Y"))->count('id');
        $dataMonthUser['Noviembre'] =  User::whereMonth('created_at', '=', '11')->whereYear('created_at', '=', date("Y"))->count('id');
        $dataMonthUser['Diciembre'] =  User::whereMonth('created_at', '=', '12')->whereYear('created_at', '=', date("Y"))->count('id');

        return $dataMonthUser;
    }

    public function mostSelledProducts()
    {
        $listMostSales = [];
        $category = Category::all();
        foreach ($category as $categories) {
            $listMostSales[(string)$categories->name] = DB::table('products')
                ->leftjoin('product_sale', 'product_sale.product_id', '=', 'products.id')
                ->leftjoin('categories', 'categories.id', '=', 'products.category_id')
                ->where('categories.name', '=', $categories->name)
                ->count();
        }
        return $listMostSales;
    }
}
