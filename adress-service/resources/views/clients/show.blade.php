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
        
        <!-- Dados do endereço -->
        @if($client->adress != null)
            <p><strong>CEP:</strong> {{ $client->adress->cep }} </p>
            <p><strong>Logradouro:</strong> {{ $client->adress->street }} </p>
            <p><strong>Numero:</strong> {{ $client->adress->number }} </p>
            <p><strong>Bairro:</strong> {{ $client->adress->neighborhood }} </p>
            <p><strong>Cidade:</strong> {{ $client->adress->city }} </p>
            <p><strong>Estado:</strong> {{ $client->adress->state }} </p>
            <p><strong>Pais:</strong> {{ $client->adress->country }} </p>
        @endif

        <a href="{{ route('clients.index') }}">Voltar</a>
    @endif
@endsection