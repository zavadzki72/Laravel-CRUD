@extends('base')
@section('content')
    <h2>Atualizar um Cliente</h2>
    <form class="form" id="update-form" method="POST" action="{{ route('clients.update', $client->cpf) }}">
        @csrf
        @method('PUT')
        <label for="Nome">Nome:</label>
        <input type="text" name="name" id="name" required value="{{ $vehicle->name }}">
        <label for="CPF">CPF:</label>
        <input type="number" name="cpf" id="cpf" required value="{{ $vehicle->cpf }}">
        <label for="Telefone">Telefone:</label>
        <input type="text" name="phone" id="phone" required value="{{ $vehicle->phone }}">
        <label for="Email">Email:</label>
        <input type="email" name="email" id="email" required value="{{ $vehicle->email }}">
    </form>
    <button form="update-form" type="submit">Salvar</button>
    <button form="delete-form" type="submit" value="Excluir" >Excluir</button>
    <form method="POST" class="form" id="delete-form" action="{{ route('clients.destroy', $client->cpf) }}">
        @csrf
        @method('DELETE')
    </form>
@endsection