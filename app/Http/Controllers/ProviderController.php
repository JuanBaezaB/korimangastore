<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        try {
            $providers = Provider::all();
        } catch (\Throwable $th) {
            return response()->json($th);
        }

        return response()->view('admin.basic_management.internal_configuration.provider.index_provider', compact('providers'));
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
        
        request()->validate(Provider::$rules);
        
        $provider = Provider::create($request->all());
        return redirect()->route('list_provider')
            ->with('success', 'Provider created successfully');
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
            request()->validate(Provider::$rules);
            $provider = Provider::where('id', '=', $id)->first();
            $provider->update($request->all());
        } catch (\Throwable $th) {
            //throw $th;
        }



        return redirect()->route('list_provider')
            ->with('success', 'Provider updated successfully');
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
        $provider = Provider::find($id)->delete();

        return redirect()->route('list_provider')
            ->with('success', 'Provider deleted successfully');
    }
}
