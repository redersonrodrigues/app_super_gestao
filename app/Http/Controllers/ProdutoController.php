<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\ProdutoDetalhe;
use App\Models\Unidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{

    public function index(Request $request)
    {
        //         /*
        //         * IMPLEMENTAÇÃO SEM O ELOQUENT ORM
        //         */

        //         $produtos = Produto::paginate(10);

        // foreach ($produtos as $key => $produto) {
        //     //print_r($produto->getAttributes());
        //     //echo '<br><br>';


        // $produtoDetalhe = ProdutoDetalhe::where('produto_id',$produto->id)->first();

        // if (isset($produtoDetalhe)) {
        //     //print_r($produtoDetalhe->getAttributes());

        //     $produtos[$key]['comprimento']  = $produtoDetalhe->comprimento;
        //     $produtos[$key]['largura']      = $produtoDetalhe->largura;
        //     $produtos[$key]['altura']       = $produtoDetalhe->altura;
        // }
        // // echo '<hr>';
        // }
        // return view(
        //     'app.produto.index',
        //     [
        //         'produtos' => $produtos,
        //         'request' => $request->all()
        //     ]
        // );
        $produtos = Produto::paginate(10);
                return view(
            'app.produto.index',
            [
                'produtos' => $produtos,
                'request' => $request->all()
            ]
        );

    }

    public function create()
    {
        $unidades = Unidade::all();
        return view('app.produto.create', ['unidades' => $unidades]);
    }


    public function store(Request $request)
    {

        $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',

        ];
        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido.',
            'nome.min' => 'O campo nome dever ter no mínimo 3 caracteres.',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres.',
            'descricao.min' => 'O campo descrição dever ter no mínimo 3 caracteres.',
            'descricao.max' => 'O campo descrição deve ter no máximo 2000 caracteres.',
            'peso.integer' => 'O campo peso deve ser do tipo inteiro.',
            'unidade_id.exists' => 'A unidade de medida informada não existe.'
        ];
        $request->validate($regras, $feedback);

        Produto::create($request->all());

        $msg = 'Produto adicionado com sucesso!';

        return redirect()->route('produto.index');
    }

    public function show(Produto $produto)
    {
        return view('app.produto.show', ['produto' => $produto]);
    }

    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades]);
        // return view('app.produto.create', ['produto' => $produto, 'unidades' => $unidades]);

    }

    public function update(Request $request, Produto $produto)
    {
        // print_r($request->all()); // payload
        // echo '<br><br><br><br><br>';
        // print_r($produto->getAttributes()); // instância do objeto no estado anterior

        $produto->update($request->all());
        return redirect()->route('produto.show', ['produto' => $produto->id]);
    }

    public function destroy(Produto $produto)
    {

        // dd($produto);
        $produto->delete();
        return redirect()->route('produto.index');
    }
}
