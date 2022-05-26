<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FigureType;

class FigureTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $figure_types =FigureType::all();
        return response()->view('admin.product_management.characteristics.figure.figure_type.list_figure_type', compact('figure_types'));
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
        //request()->validate(FigureType::$rules);
        
        $figure_type = FigureType::create($request->all());
        return redirect()->route('list_figure_type')
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
        //
        try {
            request()->validate(FigureType::$rules);
            $figure_type = FigureType::findOrFail($id);
            $figure_type->update($request->all());
        } catch (\Throwable $th) {
            //throw $th;
        }

        return redirect()->route('list_figure_type')
            ->with('success', 'updated');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $figure_type = FigureType::find($id)->delete();

        return redirect()->route('list_figure_type')
            ->with('success', 'deleted');
    }
}
