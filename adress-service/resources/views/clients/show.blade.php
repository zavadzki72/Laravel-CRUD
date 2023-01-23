@extends('base')
@section('content')
    @if (isset($msg))
        <h3 style="color: red">Cliente não encontrado!</h3>
    @else
        <h2>Mostrando dados do Cliente</h2>
        <p><strong>Nome:</strong> {{ $client->name }} </p>
        <p><strong>CPF:</strong> {{ $client->cpf }} </p>
        <p><strong>Telefone:</strong> {{ $client->phone }} </p>
        <p><strong>Email:</strong> {{ $client->email }} </p>
        <a href="{{ route('clients.index') }}">Voltar</a>
    @endif
@endsection