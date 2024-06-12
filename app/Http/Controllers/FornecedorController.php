<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
  public function index()
  {

    $fornecedores = Fornecedor::all();
    return view('app.fornecedor.index', ['fornecedores' => $fornecedores]);
  }

  public function listar(Request $request)
  {

    // dd($request->all());
    $fornecedores = Fornecedor::with(['produtos'])->where('nome', 'like', '%' . $request->input('nome') . '%')
      ->where('site', 'like', '%' . $request->input('site') . '%')
      ->where('uf', 'like', '%' . $request->input('uf') . '%')
      ->where('email', 'like', '%' . $request->input('email') . '%')
      ->paginate(10);

    //dd($fornecedores);

    return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);
  }



  public function adicionar(Request $request)
  {
    $msg = '';

    // processo de adição do registro
    if ($request->input('_token') != '' && $request->input('id') == '') { // recebe os dados via post do formulário
      // validação
      $regras = [
        'nome' => 'required|min:3|max:40',
        'site' => 'required',
        'uf' => 'required|min:2|max:2',
        'email' => 'email',
      ];
      $feedback = [
        'required' => 'O campo :attribute deve ser preenchido!',
        'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
        'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
        'uf.min' => 'O campo UF deve ter no mínimo e no máximo 2 caracteres',
        'uf.max' => 'O campo UF deve ter no mínimo e no máximo 2 caracteres',
        'email.email' => 'O campo email não foi preenchido corretametne.',
      ];
      $request->validate($regras, $feedback);

      // cadastro
      $fornecedor = new Fornecedor();
      $fornecedor->create($request->all());

      // poderia mos fazer um redirect para uma pagina de sucesso ou uma msg 
      //redirect

      // mensagem de sucesso enviada para a view
      $msg = "Cadastro realizado com sucesso.";
    }

    // processo de edição do registro
    if ($request->input('_token') != '' && $request->input('id') != '') {
      $fornecedor = Fornecedor::find($request->input('id'));
      $update = $fornecedor->update($request->all());

      if ($update) {
        $msg =  'Atualização realizado com sucesso.';
      } else {
        $msg = 'Erro ao atualilzar o registro.';
      }

      return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id'), 'msg' => $msg]);
    }
    return view('app.fornecedor.adicionar', [
      'msg' => $msg,
    ]);
  }





  public function editar($id, $msg = '')
  {
    // echo 'Chegamos até aqui.';
    //echo $id;
    $fornecedor = Fornecedor::find($id);
    //dd($fornecedor);
    return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);
  }

  public function excluir($id)
  {
    // echo 'Chegamos até aqui.';
    //echo $id;
    //Fornecedor::find($id)->delete();
    Fornecedor::find($id)->forceDelete(); // apagar do banco mesmo com softDelete


    $msg = "Fornecedor removido com sucesso";


    return redirect()->route('app.fornecedor');
  }
}
