@extends('base')
@section('content')
    <h2>Atualizar um Cliente</h2>
    <form class="form" id="update-form" method="POST" action="{{ route('clients.update', $client->cpf) }}">
        @csrf
        @method('PUT')
        <label for="Nome">Nome:</label>
        <input type="text" name="name" id="name" required value="{{ $client->name }}">
        <label for="CPF">CPF:</label>
        <input type="number" name="cpf" id="cpf" required value="{{ $client->cpf }}">
        <label for="Telefone">Telefone:</label>
        <input type="text" name="phone" id="phone" required value="{{ $client->phone }}">
        <label for="Email">Email:</label>
        <input type="email" name="email" id="email" required value="{{ $client->email }}">

        <!-- Dados do endereço -->
        @if($client->adress != null)
            <label for="CEP">CEP:</label>
            <input type="number" name="cep" id="cep" required value="{{ $client->adress->cep }}" onChange="populateFieldsWithCep(this.value);">
            <label for="Logradouro">Logradouro:</label>
            <input type="text" name="street" id="street" required value="{{ $client->adress->street }}">
            <label for="Numero">Número:</label>
            <input type="number" name="number" id="number" required value="{{ $client->adress->number }}">
            <label for="Bairro">Bairro:</label>
            <input type="text" name="neighborhood" id="neighborhood" required value="{{ $client->adress->neighborhood }}">
            <label for="Cidade">Cidade:</label>
            <input type="text" name="city" id="city" required value="{{ $client->adress->city }}">
            <label for="Estado">Estado:</label>
            <input type="text" name="state" id="state" required value="{{ $client->adress->state }}">
            <label for="Pais">Pais:</label>
            <input type="text" name="country" id="country" required value="{{ $client->adress->country }}">
        @else
        <label for="CEP">CEP:</label>
            <input type="number" name="cep" id="cep" required onChange="populateFieldsWithCep(this.value);">
            <label for="Logradouro">Logradouro:</label>
            <input type="text" name="street" id="street" required>
            <label for="Numero">Número:</label>
            <input type="number" name="number" id="number" required>
            <label for="Bairro">Bairro:</label>
            <input type="text" name="neighborhood" id="neighborhood" required>
            <label for="Cidade">Cidade:</label>
            <input type="text" name="city" id="city" required>
            <label for="Estado">Estado:</label>
            <input type="text" name="state" id="state" required>
            <label for="Pais">Pais:</label>
            <input type="text" name="country" id="country" required>
        @endif
        
    </form>
    <button form="update-form" type="submit">Salvar</button>
    <button form="delete-form" type="submit" value="Excluir" >Excluir</button>
    <form method="POST" class="form" id="delete-form" action="{{ route('clients.destroy', $client->cpf) }}">
        @csrf
        @method('DELETE')
    </form>

    <script src="{{ asset('clients.js') }}"></script>
@endsection