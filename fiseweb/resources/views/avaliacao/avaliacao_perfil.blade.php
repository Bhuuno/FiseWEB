@extends('layouts.padrao')
@section('titulo', 'Avaliação')

<link href="{{asset('css/avaliacao.css')}}" rel="stylesheet">

<script>
        // serve para chamar as fuções que quero que inicie
    window.onload = function(){
        media();

        if('<?php print $role; ?>' == 'cliente' && '<?php print $_GET['id'] ?>' != '<?php print auth()->user()->id ?>')
        {
            swal({
                title: "Informativo",
                text: "Seu nível de perfil não consegue realizar comentários, por favor cadastrar as informações pessoais!",
                icon: "info"
            })
        }
    };
</script>


<x-app-layout>
    <x-slot name="header">
        <button class="btn buttoncor" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            <img src="/icons/list.svg" class="img-button">  
        </button> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight d-inline">
            <b>AVALIAÇÕES</b>
        </h2>
    </x-slot>
    <div class="container-fluid m-2">
        <!-- menu projeto -->
        @extends('layouts.menu')

        <!-- valida se usuário não quer acessar sua propria página de avaliação! -->
        @if(auth()->user()->role == 'cliente' && $id == auth()->user()->id)
            <script>
                window.onload = function(){
                    swal({
                        title: "Erro",
                        text: "Está página é usada apenas para pessoas que possuem um cadastro profissional!",
                        icon: "error",
                            
                        buttons: {
                        btn1: "ok",
                        },
                    })
                    .then((value) => {
                        switch (value) {
                            case "btn1":
                                //volta para a página anterior
                                history.go(-1)
                            break;
                        }
                    });
   
                }
            </script>
        @else
        <div class="container">
            <!-- MENU VER PERFIL -->
            <div class="mt-3 container">
                <ul class="nav nav-tabs" id="minhaAba" role="tablist">
                    <a style="text-decoration: none;" href="/dashboard/prestador/{{$id}}?id={{$id}}">
                        <li class="nav-item" role="presentation">
                            <button  style="background-color:white; color:black" class="nav-link" id="inicial-tab" data-bs-toggle="tab" data-bs-target="#inicial" type="button"
                                role="tab" aria-controls="inicial" aria-selected="false">Perfil Prestador</button>
                        </li>
                    </a>
                    <!-- Galeria -->
                    <a  style="text-decoration: none;" href="/dashboard/avaliacao/{{$id}}?id={{$id}}">
                        <li class="nav-item" role="presentation">
                            <button style="background-color:rgb(4, 12, 124); color:rgb(255, 255, 255);" class="nav-link active d-flex" id="pefil-tab" data-bs-toggle="tab" data-bs-target="#pefil" type="button"
                                role="tab" aria-controls="pefil" aria-selected="true"><img src="/icons/star-half.svg" class="icon-space2">Avaliações</button>
                        </li>
                    </a>
                    <!-- Galeria -->
                    <a style="text-decoration: none;" href="/dashboard/galeria/{{$id}}?id={{$id}}">
                        <li class="nav-item" role="presentation">
                            <button style="background-color:white; color:black" class="nav-link" id="contato-tab" data-bs-toggle="tab" data-bs-target="#contato" type="button"
                                role="tab" aria-controls="contato" aria-selected="false">Galeria</button>
                        </li>
                    </a>
                </ul>
            <div>
                
            <div class="row main-body">
                <div class="row gutters-sm" style="padding:1%;">
                    <div class="col-lg-3">
                        <div class="card card-body mb-4">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <h3>Prestador: </h3>
                                    <img src="/img/fotos_perfil/{{isset($perfil[0]->imagem)?$perfil[0]->imagem:'sem-foto.png'}}" alt="{{$perfil[0]->nome_prestador}}" class="rounded-circle" style="width:144px; height:144px";>
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
                                        <span class="text-secondary">{{empty($perfil[0]->website) ? '---' : $perfil[0]->website}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline">
                                                <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                                            </svg>
                                            Github
                                        </h6>
                                        <span class="text-secondary">{{empty($perfil[0]->github) ? '---' : $perfil[0]->github}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info">
                                                <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                                            </svg>
                                            Twitter
                                        </h6>
                                        <span class="text-secondary">{{empty($perfil[0]->twitter) ? '---' : $perfil[0]->twitter}}</span>
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
                                        <span class="text-secondary">{{empty($perfil[0]->instagram) ? '---' : $perfil[0]->instagram}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary">
                                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                            </svg>
                                            Facebook
                                        </h6>
                                        <span class="text-secondary">{{empty($perfil[0]->facebook) ? '---' : $perfil[0]->facebook}}</span>
                                    </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-lg-9" style="display: grid; align-content: space-between; margin-bottom: 25px">
                            <div class="card" style="height:380px; overflow:auto; ">
                                <div class="card-body">
                                @if(!empty($comentario))
                                    @foreach ($comentario as $item)
                                        <div style="display: flex;">
                                            <img src="/img/fotos_perfil/{{isset($item->imagem)?$item->imagem:'sem-foto.png'}}" style="border-radius: 100%; width:26px; height:26px;" alt="">
                                            <p style="margin-left:3px;">{{$item->nome_cliente}} - {{date('d/m/Y', strtotime($item->created_at));}}</p>
                                        </div>  
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
                            <div class="card mt-4 col-lg-12 div_card">
                                <div class="card-body div_corpo">                               
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
                                    <button type="button" <?php if($id == auth()->user()->id) echo "disabled" ?> onclick="gravar_comentario()" class="btn btn-success">Enviar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <footer class="py-2">
        
            <div class="d-flex justify-content-between py-4 my-4 border-top">
            <p>© 2022 Company, Inc. All rights reserved.</p>
            <ul class="list-unstyled d-flex">
                <li class="ms-3"><a class="link-dark" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" style="color:blue;" height="35" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                    </svg>
                </a></li>
                <li class="ms-3"><a class="link-dark" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                    </svg>
                </a></li>
                <li class="ms-3"><a class="link-dark" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" style="color:red;" width="35" height="35" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
                        <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"/>
                    </svg></a></li>
            </ul>
            </div>
        </footer>
    </div>
    
       
</x-app-layout>

<script>
    function gravar_comentario(){
        
        var comentario = $("#comentario").val();
        var nota = $("#rating").val();
        var id = <?php echo $id; ?>

        $.ajax({
                url: '/gravar/comentario',
                type: 'get',
                data: {
                    id_prestador:id,
                    comentario:comentario,
                    nota:nota
                },
                success: function( result ) {  
                    document.location.reload(true);
                    console.log(result);
                },
                error: function( request, status, error ) {
                    console.log(error);
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