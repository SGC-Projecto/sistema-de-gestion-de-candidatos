<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\DerivarMail;

class MailController extends Controller
{
    //
    public function sendEmail()
    {
        $details = [
            'title'=>'Derivacion de posible candidato',
            'body'=>'Ejemplo para enviar correos desde gmail',
        ];
        Mail::to("calachi222@gmail.com")->send(new DerivarMail($details));
        return ("correo electronico enviado");
    }
}
