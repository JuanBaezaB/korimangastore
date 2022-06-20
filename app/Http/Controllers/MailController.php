<?php

namespace App\Http\Controllers;

use App\Mail\Recuperar_contraseña;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function enviarCorreo()
    {
        $detalles=[
        'tittle'=>'Correo de korimangastore',
        'body'=> 'Este es un ejemplo de envio de correo hacia gmail',
        ];
        Mail::to("jbaeza@ing.ucsc.cl")->send(new Recuperar_contraseña($detalles));
        return "Correo Electronico ENVIADO";
    }
}
