<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\UserLastLogin;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectPath()
    {
        if (auth()->user()->hasRole('Admin')) {
            return '/dashboard';
        }
        if (auth()->user()->hasRole('User')) {
            return '/';
        }
        return '/';
    }
    function authenticated(Request $request, $user){
        UserLastLogin::create([
            'user_id'=>Auth::user()->id,
            'added_on'=>now(),
        ]);

    }
}
