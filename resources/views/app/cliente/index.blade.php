@extends('app.layouts.basico')

@section('title', 'Cliente')

@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de Clientes</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('cliente.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 70%; margin-left: auto; margin-right: auto;">
                <table border="1"; width="100%">
                    <thead border="1" class="thead-dark">
                        <tr>
                            <th class="col">Nome</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <th class="col">{{ $cliente->nome }}</th>
                                 <td>
                                    <a href="{{ route('cliente.show', ['cliente'=>$cliente->id]) }}">Visualizar</a>
                                </td>
                                <td>
                                    <form id="form_{{$cliente->id}}" action="{{ route('cliente.destroy', ['cliente'=>$cliente->id]) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        {{-- <button type="submit">Excluir</button> --}}
                                        <a href="#" onclick="document.getElementById('form_{{$cliente->id}}').submit()">Excluir</a>
                                    </form>
                                    
                                </td>
                                <td>
                                    <a href="{{ route('cliente.edit',['cliente'=>$cliente->id]) }}">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

                {{-- {{ $clientes->toJson() }} --}}

                {{ $clientes->appends($request)->links() }}
                <br>
                Exibindo {{ $clientes->count() }} clientes de {{ $clientes->total() }} (de
                {{ $clientes->firstItem() }} a {{ $clientes->lastItem() }})
            </div>

        </div>
    </div>


@endsection
