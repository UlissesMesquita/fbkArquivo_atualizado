<!doctype html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/cabecalho.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/fontawesome/css/all.css')}}">
    <meta charset="utf-8">

        <title>@yield('titulo_pagina')</title>

</head>


<body>
        <!-- Logotipo - Fabrika Filmes -->
        <div class="navbar1">
                <a href="{{route('index')}}"><i class="fas fa-industry">  Fabrika Filmes</i></a>

            <!-- Cadastros -->
            <div class="dropdown1">
                    <button class="dropbtn1">Cadastros</button>
                    <div class="dropdown-content1">
                        <a href="{{route('documentos_create')}}">Cadastro de Documentos</a>
                        <a href="{{route('emitente_index')}}">Empresas Emitentes</a>
                        <a href="{{route(('destinataria_index'))}}">Empresas Destinatárias</a>
                        <a href="{{route('origem_index')}}">Origens</a>
                        <a href="{{route('departamento_index')}}">Departamentos</a>
                    </div>
            </div>

            <!-- Pesquisas -->
            <div class="dropdown1">
                <button class="dropbtn1">Pesquisas</button>
                    <div class="dropdown-content1">
                        <a href="{{route('pesquisa_index')}}">Pesquisa Geral</a>
                </div>
            </div>


            <!-- Sair -->
            <div class="dropdownExit1">
                <a href="#">Sair</a>
            </div>
        </div>

    <!-- Template -->
        <h1>@yield('titulo')</h1>

        <div class="container">

            @yield('conteudo')
            
        </div>


    
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/JQuery.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jQuery.Mascaras.js')}}"></script>
</body>
</html>
