<?php

namespace Database\Seeders;

use App\Models\UserQuestion;
use Illuminate\Database\Seeder;


class UserQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $question = new UserQuestion();
        $question->email = 'admin@admin.cl';
        $question->title = '¿Cómo puedo registrarme?';
        $question->description = 'Cómo puedo registrarme en Kori para poder comprar artículos';
        $question->answer = 'Debes hacer clic sobre el botón de "Registrarse", luego completar el formulario, y ya estarás registrado como nuevo usuario.';
        $question->status = 'Visible';
        $question->save();
    }
}
