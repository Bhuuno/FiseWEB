<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Java Script-->
    <script type="text/javascript" src="{{asset('../../js/pessoa.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>

    <!-- Bootstrap CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Style CSS -->
    <link href="{{asset('css/styles.css')}}" rel="stylesheet">

    <!-- Fontes -->
    <link href="{{asset('fonts')}}">

    <!-- Icons -->
    <link rel="stylesheet" href="/icons/app.css">
    <!-- <link href="{{asset('icons/all.css')}}" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"> -->

    <title>@yield('titulo')</title>

  </head>
  <body>

    <div class="row">
      @if(session('msg'))
          <p class="msg">{{session('msg')}}</p>
      @endif
    </div>
    @yield('conteudo')
  </body>
</html>
