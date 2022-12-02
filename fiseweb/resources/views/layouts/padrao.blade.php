<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

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
    
    @if(!empty(auth()->user()->id) && !empty(auth()->user()->role))
      <div class="fab">
        <button class="main">
          <kbd name="qtd_notificacoes" id="qtd_notificacoes" style="border-radius:27px; font-size:18px;">0</kbd>
        </button>
        <ul>
          <li style="padding: 10px;">
            <kbd  id = "limpar_perguntas">Perguntas: <span id="perg"><span id="pergunta_var">0</span></span><p id="nomes_perguntas"></p></kbd>
          </li>
          <li style="padding: 10px;">
            <kbd id = "limpar_resposta">Respostas: <span id="resp"><span id="resposta_var">0</span></span><p id="nomes_respostas"></p></kbd>
          </li>
          <!-- <li>
            <label for="opcao3">Opção 3</label>
            <button id="opcao3">
              ☏
            </button>
          </li> -->
        </ul>
      </div>
    @endif
    @yield('conteudo')
  </body>
</html>






<script >
  // VERIFICA SE POSSUI NOTIFICAÇÕES
  // Não pode colocar dentro do windows onload, isso pode dar B.O
  $.ajax({
      url: '/verificar_notificacao_perguntas',
      type: 'get',
      data: {},
      success: function(result ) {  

        var notificacao = JSON.parse(result);
        var total = parseInt(notificacao[0].perguntas) + parseInt(notificacao[0].respondido);

        //pega o valor das notificações
        document.getElementById('qtd_notificacoes').innerHTML = total;
        if(notificacao[0].perguntas > 0)
        {
          $("#pergunta_var").remove();
          document.getElementById('perg').innerHTML='<span id="pergunta">0</span>';
          document.getElementById('perg').innerHTML = notificacao[0].perguntas;
        }
        else
        {
          $("#limpar_perguntas").remove();
        }
        if(notificacao[0].respondido > 0)
        {
          $("#resposta_var").remove();
          document.getElementById('resp').innerHTML='<span id="resposta">0</span>';
          document.getElementById('resp').innerHTML = notificacao[0].respondido;
        }
        else
        {
          $("#limpar_resposta").remove();
        }
        
        if(notificacao[0].perguntas > 0)
        {
          // nomes perguntas
          $.ajax({
            url: '/nomes_notificacao_perguntas',
            type: 'get',
            data: {},
            success: function(result ) {  
              nomes = JSON.parse(result);
              $perguntas = "";
              
              
              nomes.forEach(item => $perguntas += '<a style:"width:50px; backgorund:color:red;" href="/dashboard/prestador/'+<?php echo !empty(auth()->user()->id)?auth()->user()->id:0 ?>+'?id='+<?php echo !empty(auth()->user()->id)?auth()->user()->id:0 ?>+'/#perguntas" class="text-decoration-none" style="color:yellow;"><div style="width:230px; display:block;"><div>'+item.nome+'</div></div></a>')
              $("#nomes_perguntas").html($perguntas); 

            },
            error: function( request, status, error ) {
              console.log(error);
            }
          });
        }
        if(notificacao[0].respondido > 0)
        {
          // nomes respostas
          $.ajax({
            url: '/nomes_notificacao_respostas',
            type: 'get',
            data: {},
            success: function(result) {  
              nomes = JSON.parse(result);
              $respostas = "";
              
              nomes.forEach(item => $respostas += '<a href="/dashboard/prestador/'+item.user_id+'?id='+item.user_id+'/#perguntas" class="text-decoration-none" style="color:yellow;"><div style="width:230px;">'+item.nome+'</div></a>')

              $("#nomes_respostas").html($respostas);
            },
            error: function( request, status, error ) {
              console.log(error);
            }
          });
        }

      },
      error: function( request, status, error ) {
        console.log(error);
    }
  });
</script>

<!-- API DE CHAT -->
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