<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Format;
use PhpParser\Node\Stmt\TryCatch;

class FormatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        try {
            $formats = Format::all();
        } catch (\Throwable $th) {
            return response()->json($th);
        }

        return response()->view('admin.product_management.characteristics.manga.format.index_format', compact('formats'));
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
        request()->validate(Format::$rules);
        
        $provider = Format::create($request->all());
        return redirect()->route('format.list')
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
        //
        try {
            request()->validate(Format::$rules);
            $formats = Format::where('id', '=', $id)->first();
            $formats->update($request->all());
        } catch (\Throwable $th) {
            //throw $th;
        }

        return redirect()->route('format.list')
            ->with('success', 'updated');
        return response()->json($request);
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
        $format = Format::find($id)->delete();

        return redirect()->route('format.list')
            ->with('success', 'deleted');
    }
}

