@extends('base')
@section('content')
    <div id="content-wrap">
        <section class="container">
        <h1 class="display-4 text-center  mt-5 mb-5">Novo Cliente</h1>
            <div class="row">
                <div class="col-md-12 mb-12">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                        <h5 class="mb-0">Cadastro de cliente</h5>
                        </div>
                        <div class="card-body">
                            <form class="form" method="POST" action="{{ route('clients.store') }}">
                            @csrf
                                <div class="row">
                                <div class="col">
                                    <div class="form-outline mb-2">
                                    <input type="text" id="name" name="name" class="form-control" required/>
                                    <label class="form-label" for="Nome">Nome</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline mb-2">
                                    <input type="text" id="cpf" name="cpf" class="form-control" required/>
                                    <label class="form-label" for="CPF">CPF</label>
                                    </div>
                                </div>
                                </div>
                                <div class="form-outline mb-2">
                                    <input type="email" id="email" name="email" class="form-control" required/>
                                    <label class="form-label" for="Email">Email</label>
                                </div>
                                <div class="row">
                                    <div class="col">
                                    <div class="form-outline mb-2">
                                        <input type="text" id="phone" name="phone" class="form-control" required/>
                                        <label class="form-label" for="Telefone">Telefone</label>
                                    </div>
                                    </div>
                                    <div class="col">
                                    <div class="form-outline mb-2">
                                        <input type="text" id="cep" name="cep" class="form-control" onChange="populateFieldsWithCep(this.value);" required/>
                                        <label class="form-label" for="CEP">CEP</label>
                                    </div>
                                    </div>
                                </div>
                                <div class="form-outline mb-2">
                                <input type="text" id="street" name="street" class="form-control" required/>
                                <label class="form-label" for="Logradouro">Logradouro</label>
                                </div>
                                <div class="form-outline mb-2">
                                <input type="text" id="neighborhood" name="neighborhood" class="form-control" required/>
                                <label class="form-label" for="Bairro">Bairro</label>
                                </div>
                                <div class="row">
                                    <div class="col">
                                    <div class="form-outline mb-2">
                                        <input type="number" id="number" name="number" class="form-control" required/>
                                        <label class="form-label" for="Numero">Numero</label>
                                    </div>
                                    </div>
                                    <div class="col">
                                    <div class="form-outline mb-2">
                                        <input type="text" id="city" name="city" class="form-control" required/>
                                        <label class="form-label" for="Cidade">Cidade</label>
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                    <div class="form-outline mb-2">
                                        <input type="text" id="state" name="state" class="form-control" required/>
                                        <label class="form-label" for="Estado">Estado</label>
                                    </div>
                                    </div>
                                    <div class="col">
                                    <div class="form-outline mb-5">
                                        <input type="text" id="country" name="country" class="form-control" required/>
                                        <label class="form-label" for="País">País</label>
                                    </div>
                                    </div>
                                </div>
                                <div class="form-check d-flex justify-content-center mb-2">
                                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="CADASTRAR">
                                    </input>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="{{ asset('clients.js') }}"></script>
@endsection