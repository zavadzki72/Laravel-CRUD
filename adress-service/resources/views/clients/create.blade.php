@extends('base')
@section('content')
    <h2>Cadastrar Novo Cliente</h2>
    <form class="form" method="POST" action="{{ route('clients.store') }}">
        @csrf
        <label for="Nome">Nome:</label>
        <input type="text" name="name" id="name" required>
        <label for="CPF">CPF:</label>
        <input type="number" name="cpf" id="cpf" required>
        <label for="Telefone">Telefone:</label>
        <input type="text" name="phone" id="phone" required>
        <label for="Email">Email:</label>
        <input type="email" name="email" id="email" required>
        
        <input type="submit" value="Salvar">
        <input type="reset" value="Limpar">
    </form>
@endsection