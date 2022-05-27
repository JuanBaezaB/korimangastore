<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use PhpParser\Node\Stmt\TryCatch;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $genres = Genre::all();
        } catch (\Throwable $th) {
            return response()->json($th);
        }
        
        return response()->view('admin.product_management.characteristics.manga.genre.index_genre', compact('genres'));
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
        request()->validate(Genre::$rules);

        $genre = Genre::create($request->all());
        return redirect()->route('list_genre')
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
            request()->validate(Genre::$rules);
            $genre = Genre::where('id', '=', $id)->first();
            $genre->update($request->all());

        } catch (\Throwable $th) {
            //throw $th;
        }
        


        return redirect()->route('list_genre')
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
        $genre = Genre::find($id)->delete();

        return redirect()->route('list_genre')
        ->with('success', 'deleted');
    }

    public function get_one(Request $request)
    {
        try {
            $genre = Genre::findOrFail($request->get('id'));
        } catch (\Throwable $th) {
            dd($th);
        }
        return response()->json($genre);
    }
}
