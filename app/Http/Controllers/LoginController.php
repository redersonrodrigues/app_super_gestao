<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('site.login',[
            'title' => 'Login',
        ]);
    }

    public function autenticar(){
        return 'Chegamos até aqui';
    }
}
