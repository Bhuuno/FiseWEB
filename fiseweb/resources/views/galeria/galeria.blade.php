@extends('layouts.padrao')

@method('path')

@section('titulo', 'Galeria')

<script src="{{ asset('js/jquery-3.3.1.slim.min.js') }}"></script>
<script src="{{ asset('jquery/bootstrap.min.js') }}"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashbord') }}
        </h2>
    </x-slot>

    <div class="container-fluid">
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
                <div style="width:83%">
                    <div class="album py-5 bg-light">
                        @if(auth()->user()->id == $id)
                            <div>
                                <form id="inserir" name="inserir" action="{{route('galeria.store')}}" method="post"  enctype="multipart/form-data" class="bg-white shadow row g-4 pb-8">
                                    @csrf
                                    <h4>Upload de imagens</h4>
                                    <div class="form-group">
                                        <label for="image">Imagem: </label>
                                        <input type="file" class="form-control-file" id="image" name="image">
                                    </div>

                                    <div class="col-12">
                                        <label for="comentario" class="form-label">Comentário</label>
                                        <textarea rows="2" type="text" class="form-control" name="comentario" id="comentario"></textarea>
                                    </div>

                                    <div class="col-md-12 text-center">
                                        <button onclick="verifica_campos()" type="button" class="btn btn-primary">Enviar</button>
                                    </div>
                                </form>
                            </div>
                        @endif

                        @if(!empty($galeria))
                            <div class="container">
                                <div class="row">
                                    @for($i=0; $i < count($galeria); $i++)
                                        <div class="col-md-4">
                                            <div class="card mb-4 shadow-sm">
                                                <img class="card-img-top" src="/img/galeria/{{$galeria[$i]->image}}" width="60%" height="60%" data-holder-rendered="true">
                                                <div class="card-body">
                                                    <p class="card-text">Comentário: {{$galeria[$i]->comentario}}</p>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="btn-group">
                                                        
                                                        <!-- <form name="form_exclusao" id="form_exclusao" class="form_exclusao" action="{{route('galeria.destroy',$galeria[$i]->id)}}" method="POST">
                                                            @csrf
                                                            @Method("DELETE")   
                                                            <x-button>Excluir</x-button> -->
                                                            <button type="button" style="width:75px; height:40px;" class="btn btn-primary" onclick="confirmar_exclusao(<?php echo $galeria[$i]->id ?>)">Excluir</button>
                                                        </form>
                                                        <button type="button" style="width: 70px; height:40px;" class="btn btn-primary">Editar</button>
                                                        <button class="btn btn-primary" style="width:70px; height:40px; border-radius: 1px" data-toggle="modal" data-target=".bd-example-modal-xl" onclick="foto(<?php echo $galeria[$i]->id ?>)">Abrir</button>
                                                    </div>
                                                    <small class="text-muted">{{date('d-m-Y', strtotime($galeria[$i]->created_at));}}</small>
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL IMAGEM -->
    <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content inserir_modal" name="inserir_modal" id="inserir_modal">
            </div>
        </div>
    </div>

    <!-- MODAL IMAGEM ZOOM -->
    <!-- Large modal -->

</x-app-layout>
<script>

    //VERIFICA SE POSSUI COMENTARIO E IMAGEM
    function verifica_campos()
    {
        if($('#image').val().length > 0 && $('#comentario').val().length)
        {
            document.getElementById("inserir").submit();
        }
        else
        {
            swal({
                    title: "Error",
                    text: "Não foi insirido a imagem ou comentário!",
                    icon: "error"
            })
        }
    }
    //CONSULTA E EXIBE NA MODAL
    function foto(id)
    {
        $("bd-example-modal-xl").show();
        $modal = "";
        $("#inserir_modal").html($modal);
        
        $.ajax({
                url: '/galeria/foto/consultar',
                type: 'get',
                data: {
                    id:id
                },
                success: function( result ) {  

                    var foto = JSON.parse(result);
                    
                    $modal = "";
                    $modal += "<div class='modal-header'>";
                    $modal += "<img class='card-img-top modal_foto' name='modal_foto' id='modal_foto' src='/img/galeria/"+foto.image+"' width='60%' height='60%' data-holder-rendered='true'>";
                    $modal += "<button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>";
                    $modal += "</button>";
                    $modal += "</div>";

                    $("#inserir_modal").html($modal);
                },
                error: function( request, status, error ) {
                    console.log(request,status,error);
                }
                
        });
    }

    function excluir_imagem(id){
        $.ajax({
                url: '/galeria/foto/excluir',
                type: 'get',
                data: {
                    id:id
                },
                success: function( result ) {  

                    var resposta = JSON.parse(result);

                    if(resposta == 1)
                    {
                        swal({
                            title: "Exclusao",
                            text: "Imagem deletada com sucesso!",
                            icon: "success",
                                
                            buttons: {
                            btn1: "ok",
                            },
                        })
                        .then((value) => {
                            switch (value) {
                                case "btn1":
                                    document.location.reload(true);
                                break;
                            }
                        });
                    }

                },
                error: function( request, status, error ) {
                    console.log(request,status,error);
                }
                
        });
    }
    //UTILIZADO PARA CONFIRMAR A EXCLUSÃO DE IMAGEM DA GALERIA
    function confirmar_exclusao(id){
            swal({
                title: "Exclusão!",
                text: "Você deseja remover a imagem?",
                icon: "warning",
                
                buttons: {
                btn1: "Confirmar",
                btn2: "Cancelar"
            },
        })
        .then((value) => {
        switch (value) {
            case "btn1":
                excluir_imagem(id);
            break;

            case "btn2":
            return false;
            break;

            default:
            swal("404");
        }
        });
    };
</script>