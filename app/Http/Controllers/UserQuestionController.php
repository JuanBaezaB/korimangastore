<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\UserQuestion;

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

        if($validator->fails()):
            return back()->withErrors($validator)->with('mesagge', 'Se ha producido un error.')->with('typealert', 'danger');
        else:
            $question = new UserQuestion;
            $question->email = e($request->input('email'));
            $question->title = e($request->input('title'));
            $question->description = e($request->input('description'));
            $question->answer = '';
            $question->status = 'Invisible';

            if($question->save()):
                return redirect('/')->with('mesagge', 'Se ha ingresado su consulta exitosamente.')->with('typealert', 'success');
            endif;

        endif;

    }


}
