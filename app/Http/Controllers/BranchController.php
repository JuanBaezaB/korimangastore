<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Branch;
use Illuminate\Http\Response;
use PhpParser\Node\Stmt\TryCatch;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $branches = Branch::all();

        return response()->view('admin.basic_management.internal_configuration.branch.list_branch', compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
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
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return void
     */
    public function edit(int $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        Branch::find($id)->delete();

        return redirect()->route('branch.list')
        ->with('success', 'deleted');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function get_one(Request $request)
    {
        $branch = Branch::findOrFail($request->get('id'));
        return response()->json($branch);
    }
}
