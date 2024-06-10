<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $metodo_autenticacao, $perfil): Response
    {
        echo $metodo_autenticacao.' - '.$perfil.'<br>';
        
        if ($metodo_autenticacao == 'padrao') { // testa se tem acesso
            echo "Verificar o usuário e a senha no banco de dados". $perfil .'<br>';
        };
        if($metodo_autenticacao == 'ldap') {
              echo "Verificar o usuário e a senha no AD".$perfil.'<br>';
        };




        if (false) { // testa se tem acesso
            return $next($request);
        } else {
            return Response('Acesso negado! A rota exige autenticação.');
        }
    }
}
