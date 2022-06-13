<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return response()->view('admin.basic_management.user-management.user.list_user', compact('users','roles'));
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ],
        [
            'name.required' => 'Por favor, ingrese un nombre.',
            'email.required' => 'Por favor, ingrese un email.',
            'email.unique'=> 'El email ya ha sido registrado.',
            'password.required' => 'Introduce una contraseña.',
        ]);

        if ($validator->fails()) { 
            return redirect()->route('user.list')
                ->withErrors($validator)
                ->withInput();
        } else {
            $roles = $request->roles;
            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]);
            $user->syncRoles($roles);
            
            return redirect()->route('user.list')
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
            'email' => ['required', 'string', 'email', 'max:255'],
        ],
        [
            'name.required' => 'Por favor, ingrese un nombre.',
            'email.required' => 'Por favor, ingrese un email.',
            'email.unique'=> 'El email ya ha sido registrado.',
        ]);

        if ($validator->fails()) { 
            return redirect()->route('user.list')
                ->withErrors($validator)
                ->withInput();
        } else {
            $roles = $request->roles;
            $user = User::find($id);
            $user->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]);
            $user->syncRoles($roles);
            
            return redirect()->route('user.list')
                ->with('success', 'created');
        }   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();

        return redirect()->route('user.list')
            ->with('success', 'deleted');
    }
}
