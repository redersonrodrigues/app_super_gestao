@extends('app.layouts.basico')

@section('title', 'Fornecedor')

@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor - Listar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 70%; margin-left: auto; margin-right: auto;">

                <table border="1"; width="100%">
                    <thead class="thead-dark">
                        <tr>
                            <th class="col">Nome</th>
                            <th class="col">Site</th>
                            <th class="col">UF</th>
                            <th class="col">Email</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fornecedores as $fornecedor)
                            <tr>
                                <th class="col">{{ $fornecedor->nome }}</th>
                                <td>{{ $fornecedor->site }}</td>
                                <td>{{ $fornecedor->uf }}</td>
                                <td>{{ $fornecedor->email }}</td>
                                <td>Excluir</td>
                                <td>
                                    <a href="{{ route('app.fornecedor.editar', $fornecedor->id) }}">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>

        </div>
    </div>


@endsection