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
                    <th colspan="2">Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr>
                        <td>{{ $client->cpf }} </td>
                        <td> {{ $client->name }} </td>
                        <td> {{ $client->phone }} </td>
                        <td> {{ $client->email }} </td>
                        <td> <a href="{{ route('clients.show', $client->cpf) }}">Exibir</a> </td>
                        <td> <a href="{{ route('clients.edit', $client->cpf) }}">Editar</a> </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5">Clientes Cadastrados: {{ $clients->count() }}</td>
                </tr>
            </tfoot>
        </table>
    @endif
    @if(isset($msg))
        <script>
            alert("{{$msg}}");
        </script>
    @endif
@endsection