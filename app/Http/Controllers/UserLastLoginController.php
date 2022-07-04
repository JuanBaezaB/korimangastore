<?php

namespace App\Http\Controllers;

use App\Models\UserLastLogin;
use Illuminate\Http\Request;

class UserLastLoginController extends Controller
{
    public function limitData(Request $request)
    {
        $id = $request->id();
        $lastLogin = UserLastLogin::where('user_id', '=', $id)->latest()
            ->take(5)
            ->get();

        return $lastLogin;
    }
}
