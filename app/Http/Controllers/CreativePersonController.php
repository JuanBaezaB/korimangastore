<?php

namespace App\Http\Controllers;

use App\Models\CreativePerson;
use Illuminate\Http\Request;

class CreativePersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $creative_people = CreativePerson::all();
        
        return response()->view('admin.product_management.characteristics.manga.creative_person.list_creative_person', compact('creative_people'));

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
        request()->validate(CreativePerson::$rules);

        $creative_person = CreativePerson::create($request->all());
        return redirect()->route('list_creative_person')
        ->with('success', 'created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CreativePerson  $creativePerson
     * @return \Illuminate\Http\Response
     */
    public function show(CreativePerson $creativePerson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CreativePerson  $creativePerson
     * @return \Illuminate\Http\Response
     */
    public function edit(CreativePerson $creativePerson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CreativePerson  $creativePerson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        try {
            request()->validate(CreativePerson::$rules);
            $creative_person = CreativePerson::where('id', '=', $id)->first();
            $creative_person->update($request->all());

        } catch (\Throwable $th) {
            //throw $th;
        }
        


        return redirect()->route('list_creative_person')
            ->with('success', 'updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CreativePerson  $creativePerson
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $creative_person = CreativePerson::find($id)->delete();

        return redirect()->route('list_creative_person')
        ->with('success', 'deleted');
    }
}
