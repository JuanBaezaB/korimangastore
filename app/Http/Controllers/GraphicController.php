<?php

namespace App\Http\Controllers;

use App\Models\PruebaVenta;
use Illuminate\Http\Request;

class GraphicController extends Controller
{
    //
    public function index()
    {

        return response()->view('admin.graphic.graphic_show');
    }

    public function charts(Request $request)
    {
        $ventas = PruebaVenta::all();
        $data = [];
        foreach ($ventas as $ventas) {
            $data['label'][] = $ventas->name;
            $data['data'][] = $ventas->precio;
        }
        json_encode($ventas);
        return view('admin.graphic.graphic_show', $ventas);
    }
}
