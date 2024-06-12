@extends('app.layouts.basico')

@section('title', 'Pedido')

@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de Pedidos</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 70%; margin-left: auto; margin-right: auto;">
                <table border="1"; width="100%">
                    <thead border="1" class="thead-dark">
                        <tr>
                            <th class="col">ID do Pedido</th>
                            <th class="col">Cliente</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedidos as $pedido)
                            <tr>
                                <th class="col">{{ $pedido->id }}</th>
                                <th class="col">{{ $pedido->cliente_id }}</th>
                                <th>
                                    <a href="{{ route('pedido-produto.create', ['pedido' => $pedido->id]) }}">Adicionar
                                        Pedido</a>
                                </th>
                                <td>
                                    <a href="{{ route('pedido.show', ['pedido' => $pedido->id]) }}">Visualizar</a>
                                </td>
                                <td>
                                    <form id="form_{{ $pedido->id }}"
                                        action="{{ route('pedido.destroy', ['pedido' => $pedido->id]) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        {{-- <button type="submit">Excluir</button> --}}
                                        <a href="#"
                                            onclick="document.getElementById('form_{{ $pedido->id }}').submit()">Excluir</a>
                                    </form>

                                </td>
                                <td>
                                    <a href="{{ route('pedido.edit', ['pedido' => $pedido->id]) }}">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

                {{-- {{ $pedidos->toJson() }} --}}

                {{ $pedidos->appends($request)->links() }}
                <br>
                Exibindo {{ $pedidos->count() }} pedidos de {{ $pedidos->total() }} (de
                {{ $pedidos->firstItem() }} a {{ $pedidos->lastItem() }})
            </div>

        </div>
    </div>


@endsection
