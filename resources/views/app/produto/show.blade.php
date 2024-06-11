@extends('app.layouts.basico')

@section('title', 'Produto')

@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Visualizar Produto</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <table border="1" class="table">
                    <tr>
                        <td scope="col">ID</td>
                        <th scope="row">{{ $produto->id }}</th>
                    </tr>
                    <tr>
                        <td scope="col">Nome</td>
                        <td>{{ $produto->nome }}</td>
                    </tr>
                    <tr>
                        <td scope="col">Descrição</td>
                        <td>{{ $produto->descricao }}</td>
                    </tr>
                    <tr>
                        <th scope="col">Peso</th>
                        <td>{{ $produto->peso }}</td>
                    </tr>
                    <tr>
                        <th scope="col">Unidade de Medida</th>

                        <td>{{ $produto->unidade_id }}</td>
                    </tr>


                </table>

            </div>

        </div>
    </div>


@endsection
