<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\CertificationMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function store()
    {
        $send = Mail::to('joao.vieceli@universo.univates.br','João')->send(new CertificationMail());

        var_dump($send);
        var_dump("Email send");
    }
}
