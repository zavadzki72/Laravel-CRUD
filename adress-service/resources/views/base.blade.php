<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="{{ asset('app.css') }}">
</head>
<body>
    <div class="container">
        <header>
            <h1>Clientes</h1>
        </header>
        <nav>
            <ul>
                <li><a href="/clients">Início</a></li>
                <li><a href="/clients/create">Cadastro de Clientes</a></li>
            </ul>
        </nav>
        <div class="content">
            @yield('content')
        </div>
        <footer>
            <div>
                <p>Aprendendo Laravel Framework</p>
                <p><a href="http://www.laravel.com.br" target="_blank">Laravel Site</a></p>
            </div>
            <div>
                <p>Marccus Zavadzki</p>
                <p><a href="https://marccusz.com" target="_blank">Meu Site Oficial</a></p>
            </div>
        </footer>
    </div>
</body>
</html>