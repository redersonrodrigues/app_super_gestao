<h3>Fornecedor</h3>

<table class="border" style="border-collapse: collapse; font-family:sans serif; font-size:0.8rem; letter-spacing:1px;">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Site</th>
            <th scope="col">Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($fornecedores as $fornecedor)
            <tr>
                <td style="  border: 1px solid rgb(160 160 160);
  padding: 8px 10px;">{{ $fornecedor->id }}</td>
                <th style="  border: 1px solid rgb(160 160 160);
  padding: 8px 10px;" scope="row">{{ $fornecedor->nome }}</th>
                <td style="  border: 1px solid rgb(160 160 160);
  padding: 8px 10px;">{{ $fornecedor->site }}</td>
                <td style="  border: 1px solid rgb(160 160 160);
  padding: 8px 10px;">{{ $fornecedor->email }}</td>

            </tr>
        @endforeach

    </tbody>
</table>
