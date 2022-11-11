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
    <link href="{{asset('css/notificacao.css')}}" rel="stylesheet">

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
    <div class="fab">
      <button class="main">
        <kbd style="border-radius:27px; font-size:16px;">0</kbd>
      </button>
      <ul>
        <li>
          <label for="opcao1">Opção 1</label>
          <button id="opcao1">
            ⎈
          </button>
        </li>
        <li>
          <label for="opcao2">Opção 2</label>
          <button id="opcao2">
            ⎗
          </button>
        </li>
        <li>
          <label for="opcao3">Opção 3</label>
          <button id="opcao3">
            ☏
          </button>
        </li>
      </ul>
    </div>
    @yield('conteudo')
  </body>
</html>
<!-- <script>
  window.onload = function(){
    $.ajax({
        url: '/verificar_notificacao',
        type: 'get',
        data: {},
        success: function( result ) {  
          console.log(result);
          
        },
        error: function( request, status, error ) {
          console.log(error);
        }
    });
  }
</script> -->

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/636c2b0bdaff0e1306d69f8d/1ghf8g9se';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->