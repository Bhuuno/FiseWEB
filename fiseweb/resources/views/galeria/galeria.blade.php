@extends('layouts.padrao')

@method('path')

@section('titulo', 'Galeria')

<script src="{{ asset('js/jquery-3.3.1.slim.min.js') }}"></script>
<script src="{{ asset('jquery/bootstrap.min.js') }}"></script>

<x-app-layout>
    <x-slot name="header">
        <button class="btn btn-dark p-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            <img src="/icons/list.svg" class="icon-space d-flex">  
          </button>        
          <h2 class="d-inline p-4">GALERIA</h2>
    </x-slot>

    <div class="container-fluid">
        <div class="offcanvas offcanvas-start d-flex flex-column flex-shrink-0 p-3 bg-dark" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" style="width: 280px;">
            <a href="" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-white text-decoration-none text-white">
              <span class="fs-4">Menu</span>
            </a>
                <hr>
            <ul class="nav nav-pills flex-column mb-auto">
              
              <a href="/" class="nav-link link-dark text-white">
                <li class="d-flex"><img src="/icons/house-door.svg" class="icon-space">Home</li>
                <hr>
              </a>
            
              <a href="#" class="nav-link link-dark text-white">
                <li class="d-flex"><img src="/icons/briefcase.svg" class="icon-space">Serviços</li>
                <hr>
              </a>
              
                <a href="#" class="nav-link link-dark text-white">
                  <li class="d-flex"><img src="/icons/journal-bookmark.svg" class="icon-space">Agenda</li>
                  <hr>
                </a>
              
              
                <a href="/dashboard/avaliacao" class="nav-link link-dark text-white">
                  <li class="d-flex"><img src="/icons/star-half.svg" class="icon-space">Avaliações</li>
                  <hr>
                </a>
              
              
                <a href="#" class="nav-link link-dark text-white">
                  <li class="d-flex"><img src="/icons/wrench-adjustable.svg" class="icon-space">Suporte</li>
                  <hr>
                </a>
              
              
                <a href="#" class="nav-link link-dark text-white">
                  <li class="d-flex"><img src="/icons/gear-fill.svg" class="icon-space">Configurações</li>
                  <hr>
                </a>
              
            </ul>
            <hr>
            </div>
                
                </div>
                <div class="p-4" style="width:100%">
                    <div class="album py-2 bg-light">
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
                                        @if(auth()->user()->id == $id)
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
                                                            @if(auth()->user()->id == $id)
                                                                <button type="button" style="width:75px; height:40px;" class="btn btn-primary" onclick="confirmar_exclusao(<?php echo $galeria[$i]->id ?>)">Excluir</button>
                                                        
                                                            @endif
                                                                <!-- </form> -->
                                                            @if(auth()->user()->id == $id)
                                                                <button type="button" style="width: 70px; height:40px;" type="button" class="btn btn-primary" onclick="editar_comentario(<?php echo $galeria[$i]->id ?>)" class="btn btn-primary">Editar</button>
                                                                <button class="btn btn-primary" style="width:70px; height:40px; border-radius: 1px" data-toggle="modal" data-target=".bd-example-modal-xl" onclick="foto(<?php echo $galeria[$i]->id ?>)">Abrir</button>
                                                                @if($galeria[$i]->status == 1)
                                                                    <img width="20px" src="/icons/eye-fill.svg" onclick="nao_exibir(<?php echo $galeria[$i]->id ?>)" class="icon-space">
                                                                @else
                                                                    <img width="20px" src="/icons/eye-slash-fill.svg" onclick="exibir(<?php echo $galeria[$i]->id ?>)" class="icon-space">
                                                                @endif
                                                            @endif
                                                        </div>
                                                        <small class="text-muted">{{date('d-m-Y', strtotime($galeria[$i]->created_at));}}</small>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                        @if($galeria[$i]->status == 1)
                                            <div class="col-md-4">
                                                <div class="card mb-4 shadow-sm">
                                                        <img class="card-img-top" src="/img/galeria/{{$galeria[$i]->image}}" width="60%" height="60%" data-holder-rendered="true">
                                                        <div class="card-body">
                                                            <p class="card-text">Comentário: {{$galeria[$i]->comentario}}</p>
                                                        </div>
                                                            <small class="text-muted">{{date('d-m-Y', strtotime($galeria[$i]->created_at));}}</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endif
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

    <!-- MODAL EDITAR IMAGEM -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Alteração</h5>
                </div>
                <div class="modal-body">
                    <form id="update" name="update" action="" method="get">
                        <div class="col-12">
                            <label for="comentario" class="form-label">Comentário</label>
                            <textarea rows="2" type="text" class="form-control" name="comentario_alteracao" id="comentario_alteracao"></textarea>
                        </div>
                        <br>
                        <button button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
<script>
    //EDITAR IMAGEM
    function editar_comentario(id)
    {
        $.ajax({
                url: '/galeria/foto/editar',
                type: 'get',
                data: {
                    id:id
                },
                success: function( result ) {  

                    var editar = JSON.parse(result);

                    //COLOCA COMENTARIO NO INPUT MODAL
                    document.getElementById('comentario_alteracao').value = editar.comentario;

                    //EXIBE MODAL
                    $('#exampleModalCenter').modal('show');

                    //ALTERA ACTION MODAL
                    document.getElementById('update').action = "/galeria/foto/update/"+id+"";

                },
                error: function( request, status, error ) {
                    console.log(request,status,error);
                }
                
        });
    }

    //VERIFICA SE POSSUI COMENTARIO E IMAGEM
    function verifica_campos()
    {
        if($('#image').val().length > 0 && $('#comentario').val().length)
        {
            document.getElementById("inserir").submit();
        }
        //APRESENTA ERRO SE O USUÁRIO NÃO INSERIR IMAGEM E COMENTARIO
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
    //ESSA FUNÇÃO REMOVE A IMAGEM DA GALERIA
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
                            title: "Exclusão",
                            text: "Imagem deletada com sucesso!",
                            icon: "success",
                                
                            buttons: {
                            btn1: "ok",
                            },
                        })
                        .then((value) => {
                            switch (value) {
                                case "btn1":
                                    //DEPOIS QUE EXCLUI A PESSOA CONFIRMA E ATUALIZA A PÁGINA
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
    //EXIBIR NÃO EXIBIR IMAGEM
    function nao_exibir(id)
    {
        $.ajax({
            url: '/galeria/foto/naoexibir',
            type: 'get',
            data: {
                id:id
            },
            success: function( result ) {  
                document.location.reload(true);
            },
            error: function( request, status, error ) {
                console.log(request,status,error);
            }
        });
    }
    //EXIBIR IMAGEM
    function exibir(id)
    {
        $.ajax({
            url: '/galeria/foto/exibir',
            type: 'get',
            data: {
                id:id
            },
            success: function( result ) {  
                document.location.reload(true);
            },
            error: function( request, status, error ) {
                console.log(request,status,error);
            }
                
        });
    }

</script>