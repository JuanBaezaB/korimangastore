<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();
        return response()->view('admin.basic_management.user-management.permission.list_permission', compact('permissions'));
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
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => ['required', 'string', 'max:255', 'unique:permissions'],
        ],
        [
            'name.required' => 'Por favor, ingrese un nombre.',
            'name.unique' => 'El nombre ya ha sido registrado.',
        ]);

        if ($validator->fails()) { 
            return redirect()->route('permission.list')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput();
        } else {
            Permission::Create([
                'name'=>$request['name']
            ]);
            return redirect()->route('permission.list')
                ->with('success', 'created');
        }   

        
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
    public function update(Request $request, $id){
       
        $validator = Validator::make($request->all(),[
            'name' => ['required', 'string', 'max:255', 'unique:permissions'],
        ],
        [
            'name.required' => 'Por favor, ingrese un nombre.',
            'name.unique' => 'El nombre ya ha sido registrado.',
        ]);

        if ($validator->fails()) { 
            return redirect()->route('permission.list')
                ->withErrors($validator)
                ->withInput();
        } else {
            $permission = Permission::where('id', '=', $id)->first();
            $permission->update([
                'name'=>$request['name']
            ]);

            return redirect()->route('permission.list')
            ->with('success', 'updated');
        }   
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $permission = Permission::find($id)->delete();

        return redirect()->route('permission.list')
            ->with('success', 'deleted');
    }
}
