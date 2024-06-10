<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
use App\Models\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {



        // $motivo_contatos = [
        //     '1' => 'Dúvida',
        //     '2' => 'Elogio',
        //     '3' => 'Reclamação'
        // ];
        // dd($request);
        //    echo '<pre>';
        //    print_r($request->all());
        //    echo '</pre>';
        //    echo $request->input('nome');
        //   echo '<br>';
        //    echo $request->input('email');
        //   echo '<br>';

        // cadastrando via instanciação
        // $contato = new SiteContato();
        // $contato->nome = $request->input('nome');
        // $contato->telefone = $request->input('telefone');
        // $contato->email = $request->input('email');
        // $contato->motivo_contato = $request->input('motivo_contato');
        // $contato->mensagem = $request->input('mensagem');
        // print_r($contato->getAttributes());
        // $contato->save();

        // cadastrando via metodo fill com request->all
        // $contato = new SiteContato();
        // $contato->fill($request->all());
        //print_r($contato->getAttributes());
        // $contato->save();


        // cadastrando via metodo create
        // $contato = new SiteContato();
        // $contato->create($request->all());

        $motivo_contatos = MotivoContato::all();
        return view('site.contato', ['title' => 'Contato c', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request)
    {

        $regras = [
            'nome'                  => 'required|min:3|max:40|unique:site_contatos', // nomes com no mínimo 3 e no maximo 40 caracteres
            'telefone'              => 'required',
            'email'                 => 'email',
            'motivo_contatos_id'    => 'required',
            'mensagem'              => 'required|max:2000'
        ];
        $feedback = [
            'nome.required'                 => 'O campo nome precisa ser preenchido',
            'nome.min'                      => 'O campo nome pode ter no mínimo 3 caracteres',
            'nome.min'                      => 'O campo nome pode ter no máximo 40 caracteres',
            'nome.unique'                   => 'O nome informado já está em uso',
            'email.email'                   => 'O  email informado não é valido. Deve ter o formato de email',
            'mensagem.max'                  => 'o campo mensagem pode ter no máximo 2000 caracteres',
            'required'                      => 'O campo :attribute deve ser preenchido'
        ];

        $request->validate($regras,$feedback);

        // // dd($request);
        // // realizar a validação dos dados recebidos no request vindos do formulário
        // $request->validate(
        //     [
        //         'nome'                  => 'required|min:3|max:40|unique:site_contatos', // nomes com no mínimo 3 e no maximo 40 caracteres
        //         'telefone'              => 'required',
        //         'email'                 => 'email',
        //         'motivo_contatos_id'    => 'required',
        //         'mensagem'              => 'required|max:2000'

        //     ],
        //     [
        //         // mensagens traduzidas de acordo com a determinação para o item
        //         'nome.required'                 => 'O campo nome precisa ser preenchido',
        //         'nome.min'                      => 'O campo nome pode ter no mínimo 3 caracteres',
        //         'nome.min'                      => 'O campo nome pode ter no máximo 40 caracteres',
        //         'nome.unique'                   => 'O nome informado já está em uso',
        //         'email.email'                   => 'O  email informado não é valido. Deve ter o formato de email',
        //         // 'motivo_contatos_id.required'   => 'O campo motivo_contatos_id precisa ser preenchido',
        //         // 'mensagem.required'             => 'O campo mensagem precisa ser preenchido',
        //         'mensagem.max'                  => 'o campo mensagem pode ter no máximo 2000 caracteres',

        //         // traduçao da determinação de validação 
        //         'required'              => 'O campo :attribute deve ser preenchido'


        //     ]
        // );

        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
