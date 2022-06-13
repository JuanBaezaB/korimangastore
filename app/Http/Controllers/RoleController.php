<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $roles = Role::all();
        $permissions = Permission::all();
        return response()->view('admin.basic_management.user-management.role.list_role', compact('roles','permissions'));
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
            'name' => ['required', 'string', 'max:255', 'unique:roles'],
        ],
        [
            'name.required' => 'Por favor, ingrese un nombre.',
            'name.unique' => 'El nombre ya ha sido registrado.',
        ]);

        if ($validator->fails()) { 
            return redirect()->route('role.list')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput();
        } else {
            $permissions = $request->permissions;
            $role = Role::Create([
                'name'=>$request['name']
            ]);
            $role->syncPermissions($permissions);
            return redirect()->route('role.list')
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
            'name' => ['required', 'string', 'max:255'],
        ],
        [
            'name.required' => 'Por favor, ingrese un nombre.',
        ]);

        if ($validator->fails()) { 
            return redirect()->route('role.list')
                ->withErrors($validator)
                ->withInput();
        } else {
            $permissions = $request->permissions;
            $role = Role::where('id', '=', $id)->first();
            $role->update([
                'name'=>$request['name']
            ]);
            $role->syncPermissions($permissions);
            return redirect()->route('role.list')
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
        $role = Role::find($id)->delete();

        return redirect()->route('role.list')
            ->with('success', 'deleted');
    }
}
