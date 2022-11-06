<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
      body { overflow-x: hidden; }
    </style>
    
    <!--Java Script-->
    <script type="text/javascript" src="{{asset('../../js/pessoa.js')}}"></script>
    <script type="text/javascript" src="{{asset('../../js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>

    <!-- UTILIZADO PARA FUNCIONAR O DATA-MASK -->
    <script type="text/javascript" src="{{asset('../../js/jquery.mask.js')}}"></script>

    <!-- Funcionar Modal -->
    <!-- <script src="{{ asset('../../../jquery/bootstrap.min.js') }}"></script>    -->

    <!--Para funcionar o AJAX-->
    <script type="text/javascript"> 
      $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } }); 
    </script>

    <!-- alert -->    
    <script src="{{ asset('alert/jquery.min.js') }}"></script>    
    <script src="{{ asset('alert/sweetalert.min.js') }}"></script>

    <!-- Bootstrap CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Style CSS -->
    <link href="{{asset('css/styles.css')}}" rel="stylesheet">

    <!-- Fontes -->
    <link href="{{asset('fonts')}}">

    <title>@yield('titulo')</title>

  </head>
  <body>

    <!-- <div class="row">
      @if(session('msg'))
          <p class="msg">{{session('msg')}}</p>
      @endif
    </div> -->
    @yield('conteudo')
  </body>
</html>
