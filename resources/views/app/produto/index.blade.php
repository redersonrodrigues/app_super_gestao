@extends('app.layouts.basico')

@section('title', 'Produto')

@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de produtos</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 70%; margin-left: auto; margin-right: auto;">
                {{-- {{ $produtos->toJson() }} --}}
                <table border="1"; width="100%">
                    <thead border="1" class="thead-dark">
                        <tr>
                            <th class="col">Nome</th>
                            <th class="col">Descrição</th>
                            <th class="col">Fornecedor</th>
                            <th class="col">Peso</th>
                            <th class="col">Unidade</th>
                            <th class="col">Comprimento</th>
                            <th class="col">Largura</th>
                            <th class="col">Altura</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $produto)
                            <tr>
                                <th class="col">{{ $produto->nome }}</th>
                                <td>{{ $produto->descricao }}</td>
                                <td>{{ $produto->fornecedor->nome }}</td>
                                <td>{{ $produto->peso }}</td>
                                <td>{{ $produto->unidade_id }}</td>
                                <td>{{ $produto->itemDetalhe->comprimento ?? '' }}</td>
                                <td>{{ $produto->itemDetalhe->largura ?? '' }}</td>
                                <td>{{ $produto->itemDetalhe->altura ?? '' }}</td>
                                <td>
                                    <a href="{{ route('produto.show', ['produto'=>$produto->id]) }}">Visualizar</a>
                                </td>
                                <td>
                                    <form id="form_{{$produto->id}}" action="{{ route('produto.destroy', ['produto'=>$produto->id]) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        {{-- <button type="submit">Excluir</button> --}}
                                        <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()">Excluir</a>
                                    </form>
                                    
                                </td>
                                <td>
                                    <a href="{{ route('produto.edit',['produto'=>$produto->id]) }}">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

                {{-- {{ $produtos->toJson() }} --}}

                {{ $produtos->appends($request)->links() }}
                <br>
                Exibindo {{ $produtos->count() }} produtos de {{ $produtos->total() }} (de
                {{ $produtos->firstItem() }} a {{ $produtos->lastItem() }})
            </div>

        </div>
    </div>


@endsection
