<?php

namespace App\Http\Middleware;

use App\Models\LogAcesso;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // $request - manipular
        //dd($request);
        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();
        // $response - manipular

        LogAcesso::create(['log' => "IP $ip requisitou a rota $rota "]); // aspas duplas para não precisar concatenar
        $resposta =  $next($request); // encaminha a requisição para o proximo comando (outro middleware por exemplo)
        $resposta->setStatusCode(201, 'O estatus de resposta e o texto de resposta foram modificados');
        //return Response('Chegamos no middleware e finalizamos no próprio middleware');
        //    dd($resposta);
        return $resposta;
    }
}
