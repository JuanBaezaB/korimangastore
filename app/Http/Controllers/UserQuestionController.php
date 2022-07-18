<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserQuestionController extends Controller
{
    public function index(){
        return response()->view('public.user-support');
    }

    public function question(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => ['required', 'string', 'email', 'max:30'],
            'title' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string', 'max:255'],
            'answer',
            'status',
        ],
        [
            'email.required' => 'Por favor, ingrese un email.',
            'email.email' => 'Por favor, ingrese un email válido.',
            'title.required' => 'Por favor, introduce un asunto.',
            'title.required' => 'Por favor, introduce una descripción.',
        ]);

    }


}
