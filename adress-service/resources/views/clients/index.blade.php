@extends('base')
@section('content')
    <h2>Clientes</h2>
    @if (!isset($clients))
        <h3 style="color: red">Ainda não existem clientes cadastrados!</h3>
    @else
        <table class="data-table">
            <thead>
                <tr>
                    <th>CPF</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>CEP</th>
                    <th colspan="3">Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr>
                        <td>{{ $client->cpf }} </td>
                        <td> {{ $client->name }} </td>
                        <td> {{ $client->phone }} </td>
                        <td> {{ $client->email }} </td>
                        <td> {{ ($client->adress != null) ? $client->adress->cep : "-" }} </td>
                        <td> <a href="{{ route('clients.show', $client->cpf) }}">Exibir</a> </td>
                        <td> <a href="{{ route('clients.edit', $client->cpf) }}">Editar</a> </td>
                        <td> <a href="{{ route('clients.destroy', $client->cpf) }}">Excluir</a> </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="8">Clientes Cadastrados: {{ $clients->count() }}</td>
                </tr>
            </tfoot>
        </table>
    @endif
    @if(session('msg'))
        <script>
            alert("{{session('msg')}}");
        </script>
    @endif
@endsection