@extends('layouts.padrao')
@section('titulo', 'Avaliação')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashbord') }}
        </h2>
    </x-slot>
    <div class="container-fluid m-2">
        <div class="row flex-nowrap ">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="/dashboard" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                            <span class="fs-5 d-none d-sm-inline">Menu</span>
                        </a>
                        <ul>
                            <a href="/" class="text-decoration-none text-white">
                                <li class="d-flex" href="/"><img src="/icons/house-door.svg" class="icon-space"> Home <li>
                                <hr>
                            </a>
                            <a href="/dashboard/perfil" class="text-decoration-none text-white">
                                <li class="d-flex"><img src="/icons/chat-dots.svg" class="icon-space"> Perfil</li>
                                <hr>
                            </a>
                            <li class="d-flex"><img src="/icons/briefcase.svg" class="icon-space">Serviços</li>
                            <hr>
                            <li class="d-flex"><img src="/icons/journal-bookmark.svg" class="icon-space">Agenda</li>
                            <hr>
                            <a href="/dashboard/avaliacao" lass="text-decoration-none text-white">
                            <li class="d-flex"><img src="/icons/star-half.svg" class="icon-space">Avaliações</li>
                            <hr>
                            </a>
                            <li class="d-flex"><img src="/icons/wrench-adjustable.svg" class="icon-space">Suporte</li>
                            <hr>
                            <li class="d-flex"><img src="/icons/gear-fill.svg" class="icon-space">Configurações</li>
                            <hr>
                        </ul>
                    </div>
                </div>
            <div class="row main-body">
                <div class="row gutters-sm" style="padding:1%;">
                    <div class="col-md-3">
                        <div class="card card-body">

                                <div class="d-flex flex-column align-items-center text-center">
                                    <h3>Prestador: </h3>
                                    <img src="/img/fotos_perfil/{{$perfil[0]->imagem}}" alt="{{$perfil[0]->nome_prestador}}" class="rounded-circle" style="width:144px; height:144px";>
                                    <div class="mt-3">
                                        <h4>{{$perfil[0]->nome_prestador}}</h4>
                                        <h6>{{strtoupper($perfil[0]->profissao)}}</h6>
                                        <div style="display: flex; justify-content:center;">
                                            <p id="media">0</p>
                                            <img style="height: fit-content; padding: 2px;"width="25px" src="/img/star1.png">
                                        </div>
                                        <div style="display: flex; justify-content:center;">
                                            <p id="quantidade">0 </p>
                                            Avaliações
                                        </div>
                                    </div>
                                </div>
                        
                                <div class="card mt-3">
                                    <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <line x1="2" y1="12" x2="22" y2="12"></line>
                                                <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                            </svg>
                                            Website
                                        </h6>
                                        <span class="text-secondary">https://bootdey.com</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline">
                                                <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                                            </svg>
                                            Github
                                        </h6>
                                        <span class="text-secondary">bootdey</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info">
                                                <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                                            </svg>
                                            Twitter
                                        </h6>
                                        <span class="text-secondary">@bootdey</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger">
                                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                            </svg>
                                            Instagram
                                        </h6>
                                        <span class="text-secondary">bootdey</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary">
                                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                            </svg>
                                            Facebook
                                        </h6>
                                        <span class="text-secondary">bootdey</span>
                                    </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                      
                        <div class="col-sm-7">
                            <div class="card" style="overflow: auto; width: 100%; height:375px;">
                                <div class="card-body">
                                @if(!empty($comentario))
                                    @foreach ($comentario as $item)
                                        <p>{{$item->nome_cliente}} - {{date('d/m/Y', strtotime($item->created_at));}}</p>
                                        <div class="col-sm-7 text-secondary">
                                            {{$item->comentario}}
                                            <br>
                                            <!-- Nota: {{$item->avaliacao}} -->
                                            <hr>
                                        </div>
                                    @endforeach
                                @else
                                    Não possui comentários!
                                @endif
                                </div>
                            </div>
                            <div class="card mt-2">
                                <div class="card-body">                               
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Escreva aqui seu comentário</label>
                                        <textarea id="comentario" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                    <br>
                                    <label>Avaliação por serviço:</label>
                                    <div style="display:flex; justify-content:left">
                                        <a href="javascript:void(0)" onclick="Avaliar(1)">
                                        <img width="35px" src="/img/star0.png" id="s1"></a>

                                        <a href="javascript:void(0)" onclick="Avaliar(2)">
                                        <img width="35px" src="/img/star0.png" id="s2"></a>

                                        <a href="javascript:void(0)" onclick="Avaliar(3)">
                                        <img width="35px" src="/img/star0.png" id="s3"></a>

                                        <a href="javascript:void(0)" onclick="Avaliar(4)">
                                        <img width="35px" src="/img/star0.png" id="s4"></a>

                                        <a href="javascript:void(0)" onclick="Avaliar(5)">
                                        <img width="35px" src="/img/star0.png" id="s5"></a>

                                        <input id="rating" type="text" value="0" hidden >
                                        <p id="rating_nota">0</p>
                                    </div>
                                    <br>
                                    <button type="button" onclick="gravar_comentario()" class="btn btn-dark">Enviar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
       
</x-app-layout>

<script>
    // serve para chamar as fuções que quero que inicie
    window.onload = function(){
        media();
    };


    function gravar_comentario(){
        
        var comentario = $("#comentario").val();
        var nota = $("#rating").val();
        var id = <?php echo $id; ?>

        $.ajax({
                url: '/gravar/comentario',
                type: 'get',
                data: {
                    id:id,
                    comentario:comentario,
                    nota:nota
                },
                success: function( result ) {  
                    document.location.reload(true);
                },
                error: function( request, status, error ) {
                    console.log(request,status,error);
                }
                
        });
    }
        
    function media(){
        var id = <?php echo $id; ?>

        $.ajax({
                url: '/media',
                type: 'get',
                data: {
                    id:id
                },
                success: function( result ) {  
                    resposta = JSON.parse(result);

                    media = resposta[0].total_nota / resposta[0].qtde_avaliacao;

                    //ALETRA O VALOR DA MEDIA
                    if(resposta[0].total_nota != null)
                        document.getElementById('media').innerHTML = media.toFixed(1)

                    //MOSTRA A QANTIDADE DE VISUALIZAÇÕES
                    document.getElementById('quantidade').innerHTML = resposta[0].qtde_avaliacao
                },
                error: function( request, status, error ) {
                    console.log(request,status,error);
                }
                
        });
    }

    function Avaliar(estrela) {

        //FUNÇÃO PEGO DA INTERNET
        var url = window.location;
        url = url.toString()
        url = url.split("index.html");
        url = url[0];

        var s1 = document.getElementById("s1").src;
        var s2 = document.getElementById("s2").src;
        var s3 = document.getElementById("s3").src;
        var s4 = document.getElementById("s4").src;
        var s5 = document.getElementById("s5").src;
        var avaliacao = 0;

        if (estrela == 5){ 
            document.getElementById("s1").src = "/img/star1.png";
            document.getElementById("s2").src = "/img/star1.png";
            document.getElementById("s3").src = "/img/star1.png";
            document.getElementById("s4").src = "/img/star1.png";
            document.getElementById("s5").src = "/img/star1.png";
            avaliacao = 5;
        }
        
        //ESTRELA 4
        if (estrela == 4){ 
            document.getElementById("s1").src = "/img/star1.png";
            document.getElementById("s2").src = "/img/star1.png";
            document.getElementById("s3").src = "/img/star1.png";
            document.getElementById("s4").src = "/img/star1.png";
            document.getElementById("s5").src = "/img/star0.png";
            avaliacao = 4;
        }

        //ESTRELA 3
        if (estrela == 3){ 
            document.getElementById("s1").src = "/img/star1.png";
            document.getElementById("s2").src = "/img/star1.png";
            document.getElementById("s3").src = "/img/star1.png";
            document.getElementById("s4").src = "/img/star0.png";
            document.getElementById("s5").src = "/img/star0.png";
            avaliacao = 3;
        }
        
        //ESTRELA 2
        if (estrela == 2){
            document.getElementById("s1").src = "/img/star1.png";
            document.getElementById("s2").src = "/img/star1.png";
            document.getElementById("s3").src = "/img/star0.png";
            document.getElementById("s4").src = "/img/star0.png";
            document.getElementById("s5").src = "/img/star0.png";
            avaliacao = 2;
        }
        
        //ESTRELA 1
        if (estrela == 1){ 
            document.getElementById("s1").src = "/img/star1.png";
            document.getElementById("s2").src = "/img/star0.png";
            document.getElementById("s3").src = "/img/star0.png";
            document.getElementById("s4").src = "/img/star0.png";
            document.getElementById("s5").src = "/img/star0.png";
            avaliacao = 1;
        }
        document.getElementById('rating_nota').innerHTML = avaliacao;
        var nota = $("#rating").val(avaliacao);
    }
</script>