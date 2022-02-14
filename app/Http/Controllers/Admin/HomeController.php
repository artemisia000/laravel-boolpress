<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\SendWelcomeEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{  
    //Admin homepage

    public function index() {

        //test invio mail
        
        //A. versione statica
       // Mail::to('account@mail.it')->send(new SendWelcomeEmail());

        //B.con Auth
        //Mail::to(Auth::user()->email)->send(new SendWelcomeEmail());

        //C. con passaggio dati a classe ..vista per email
        Mail::to(Auth::user()->email)->send(new SendWelcomeEmail(Auth::user()->name));
    

        return view('admin.home');
    }
}
