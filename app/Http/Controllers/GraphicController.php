<?php

namespace App\Http\Controllers;

use App\Models\Sales;
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
        $ventas = Sales::all();
        
        return response()->view('admin.graphic.graphic',compact('ventas'));
    }
}
