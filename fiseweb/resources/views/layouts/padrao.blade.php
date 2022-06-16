<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Java Script-->
    <script type="text/javascript" src="{{asset('../../js/script.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>

    <!-- Bootstrap CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/styles.css')}}" rel="stylesheet">

    <!-- Fontes -->
    <link href="{{asset('fonts')}}">

    <title>@yield('titulo')</title>

  </head>
  <body>
    @yield('conteudo')
    <footer class="position-absolute bottom-0 start-50 translate-middle-x">
            <p>FiseWEB &copy; 2022</p>
    </footer>
  </body>
</html>