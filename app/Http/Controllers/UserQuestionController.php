<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\UserQuestion;

class UserQuestionController extends Controller
{
    public function index()
    {
        return response()->view('public.user-support');
    }

    public function question(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => ['required', 'string', 'email', 'max:50'],
                'title' => ['required', 'string', 'max:100'],
                'description' => ['required', 'string', 'max:500'],
                'answer',
                'status',
            ],
            [
                'email.required' => 'Por favor, ingrese un email.',
                'email.max' => 'Por favor, ingrese un email de máximo 50 caracteres.',
                'email.email' => 'Por favor, ingrese un email válido.',
                'title.required' => 'Por favor, introduzca un asunto.',
                'title.max' => 'Por favor, introduzca un asunto de máximo 100 caracteres.',
                'description.required' => 'Por favor, introduce una descripción.',
                'description.max' => 'La descripción debe contener como máximo 500 caracteres.',
            ]
        );

        if ($validator->fails()) :
            return back()->withErrors($validator)->with('mesagge', 'Se ha producido un error.')->with('typealert', 'danger');
        else :
            $question = new UserQuestion;
            $question->email = e($request->input('email'));
            $question->title = e($request->input('title'));
            $question->description = e($request->input('description'));
            // $question->answer = '';
            $question->status = 'Invisible';

            if ($question->save()) :
                return redirect()->route('userfaq-success')->with('mesagge', 'Se ha ingresado su consulta exitosamente.')->with('typealert', 'success');
            endif;

        endif;
    }

    public function listado()
    {
        $questions = UserQuestion::all();
        $questions->each->loadStatusBooleanField();

        return response()->view('admin.support.list_adminfaq', compact('questions'));
    }

    public function visible()
    {
        $questions = UserQuestion::query()->where('status', 'Visible')->get();

        return response()->view('public.faq', compact('questions') );
    }

    public function destroy($id)
    {
        //
        $questions = UserQuestion::find($id)->delete();

        return redirect()->route('user-questions.list')
            ->with('success', 'deleted');
    }

    public function update(Request $request, $id)
    {
        try {
            request()->validate(UserQuestion::$rules);
            $question = UserQuestion::where('id', '=', $id)->first();
            $question->update([
                'email' => $request->email,
                'title' => $request->title,
                'description' => $request->description,
                'answer' => $request->answer,
                'status' => UserQuestion::booleanToStatus($request->has('status')),
            ]);
        } catch (\Throwable $th) {
            dd($th);
        }



        return redirect()->route('user-questions.list')
            ->with('success', 'updated');
        return response()->json($request);
    }

    public function get_one(Request $request)
    {
        $userQuestion = UserQuestion::findOrFail($request->get('id'));
        $userQuestion->loadStatusBooleanField();
        return response()->json($userQuestion);
    }
}
