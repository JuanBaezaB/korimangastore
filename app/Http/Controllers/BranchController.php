<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;
use PhpParser\Node\Stmt\TryCatch;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = Branch::all();
        
        return response()->view('admin.basic_management.internal_configuration.branch.list_branch', compact('branches'));
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
        request()->validate(Branch::$rules);

        $branch = Branch::create($request->all());
        return redirect()->route('branch.list')
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
            request()->validate(Branch::$rules);
            $branch = Branch::where('id', '=', $id)->first();
            $branch->update($request->all());

        } catch (\Throwable $th) {
            //throw $th;
        }
        


        return redirect()->route('branch.list')
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
        $branch = Branch::find($id)->delete();

        return redirect()->route('branch.list')
        ->with('success', 'deleted');
    }

    public function get_one(Request $request)
    {
        $branch = Branch::findOrFail($request->get('id'));
        return response()->json($branch);
    }

    public function search(Request $request) {
        $ret = [];
        $term = $request->get('term');
        $results = Branch::orWhere('name', 'LIKE', '%' . $term . '%')
        ->get()
        ->map(function ($d) use ($request) {
            $d->text = $d->name;
            $d->selected = $d->id == $request->get('selected', false);
            return $d;
        });

        if ($request->get('add_all_option')) {
            $results->push([
                'id' => -1,
                'text' => 'Todas',
                'selected' => $request->get('selected', false) == -1
            ]);
        }

        $ret['results'] = $results->toArray();

        return response()->json($ret);
    }
}
