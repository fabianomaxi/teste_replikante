<!doctype html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

        <script src="{{ asset('js/validaFormPordutos.js')}}"></script>
        <script src="{{ asset('js/validacoes.js')}}"></script>
        

        <title>Controle de Séries</title>


    </head>
    <body>

    	<div class="container">

    		<div class="jumbotron">
    		  <h1 class="display-4">@yield('titulo')</h1>
    		  <p class="lead">@yield('subtitulo')</p>
    		</div>

            @yield('conteudo')

        </div>    


    </body>
</html>    