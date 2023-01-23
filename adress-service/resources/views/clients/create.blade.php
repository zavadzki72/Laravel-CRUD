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

        <!-- Dados do endereço -->
        <label for="CEP">CEP:</label>
        <input type="number" name="cep" id="cep" onChange="populateFieldsWithCep(this.value);" required>
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

        <input type="submit" value="Salvar">
        <input type="reset" value="Limpar">
    </form>

    <script src="{{ asset('clients.js') }}"></script>
@endsection