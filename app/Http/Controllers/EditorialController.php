<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Editorial;
use PhpParser\Node\Stmt\TryCatch;

class EditorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        
        $editorials = Editorial::all();

        return response()->view('admin.product_management.characteristics.manga.editorial.index_editorial', compact('editorials'));
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
        request()->validate(Editorial::$rules);
        
        $editorial = Editorial::create($request->all());
        return redirect()->route('list_editorial')
            ->with('success', 'Editorial created successfully');
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
            request()->validate(Editorial::$rules);
            $editorials = Editorial::where('id', '=', $id)->first();
            $editorials->update($request->all());
        } catch (\Throwable $th) {
            //throw $th;
        }



        return redirect()->route('list_editorial')
            ->with('success', 'Editorial updated successfully');
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
        $editorial = Editorial::find($id)->delete();

        return redirect()->route('list_editorial')
            ->with('success', 'Editorial deleted successfully');
    }
}

