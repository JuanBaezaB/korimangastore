<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleController extends Controller
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price'
    ];
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::all();
        
        return response()->view('admin.basic_management.internal_configuration.sale.list_sale', compact('sales'));
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
        request()->validate(Sale::$rules);

        $sale = Sale::create($request->all());
        return redirect()->route('sale.list')
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
        try {
            request()->validate(Sale::$rules);
            $sale = Sale::where('id', '=', $id)->first();
            $sale->update($request->all());

        } catch (\Throwable $th) {
            //throw $th;
        }
        


        return redirect()->route('sale.list')
            ->with('success', 'updated');
        return response() -> json($request);    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sale = Sale::find($id)->delete();

        return redirect()->route('sale.list')
        ->with('success', 'deleted');
    }
    //esta es la clave
    public function get_one(Request $request)
    {
        $sale = Sale::findOrFail($request->get('id'));
        return response()->json($sale);
    }

    public function charts(Request $request)
    {
        //$sale = Sale::findOrFail($request->get('id'));
        //return response()->json($sale);
        
        //$plazas = DB::table('sale')->select(['schedule_id', DB::raw('SUM(capMax) as capmax')])->groupBy('schedule_id')->get();

        $sales = Sale::all();
        return response()->view('admin.basic_management.internal_configuration.sale.graphic.graphic', compact('sales'));
    }
    public function charts2(Request $request)
    {
        //$sale = Sale::findOrFail($request->get('id'));
        //return response()->json($sale);
        
        //$plazas = DB::table('sale')->select(['schedule_id', DB::raw('SUM(capMax) as capmax')])->groupBy('schedule_id')->get();

        $sales = Sale::all();
        return response()->view('admin.basic_management.internal_configuration.sale.graphic.graphic2', compact('sales'));
    }
    //charts para hacer consulta con response y devolver json
        public function consultaCompra(){
            /*
            $product = Sale::table('sales');
            $idproduct = Sale::table('sales')->where('id', $product)->first();
            */
            $sale = Sale::find(1)->name;
        return $sale->name;    
        }
        
}
