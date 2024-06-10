<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $erro = '';
        if ($request->get('erro') == 1) {
            $erro = 'Usuário e/ou senha não existe.';
        }
        if ($request->get('erro') == 2) {
            $erro = 'Necessário realizar login para ter acesso a página.';
        }
        return view('site.login', [
            'title' => 'Login',
            'erro'  => $erro,
        ]);
    }

    public function autenticar(Request $request)
    {
        $regras = [
            'usuario'   => 'email',
            'senha'     => 'required'
        ];
        $feedback = [
            'usuario.email'     => 'O campo usuário (email) é obrigatório.',
            'senha.required'    => 'O campo senha é obrigatório'
        ];
        $request->validate($regras, $feedback);

        $email      = $request->get('usuario');
        $password   = $request->get('senha');
        //print_r($request->all());
        // echo "Usuario:  $email | Senha: $senha";
        // incluir o model User
        $user = new User();
        // verificar se existe no banco(get) e retorna o resultado(first)
        $usuario = $user->where('email', $email)
            ->where('password', $password)
            ->get()
            ->first();


        if (isset($usuario->name)) {
            // O usuário existe
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;
            //dd($_SESSION);
            return redirect()->route('app.clientes');
        } else {
            // O usuaário não existe
            return redirect()->route('site.login', ['erro' => 1,]);
        }
    }
}
