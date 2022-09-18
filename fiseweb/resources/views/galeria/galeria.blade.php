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
        <h2 class="font-semibold text-xl text-gray-800 leading-tight d-inline p-3">
            GALERIA
        </h2>
    </x-slot>

    <div class="container-fluid">
        <!-- menu projeto -->
        @extends('layouts.menu')
        @if(auth()->user()->role == 'cliente' && $_GET['id'] == auth()->user()->id)
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
    </div>
        @else
                <div class="p-4">
                    <div class="album py-2 bg-light container">
                        @if(auth()->user()->id == $id && auth()->user()->role != 'cliente' && auth()->user()->role != 'pessoal')
                            <div style="padding: 30px 80px 10px 80px;">
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

                                    <div class="col-md-12 text-center mb-4">
                                        <button onclick="verifica_campos()" type="button" class="btn btn-primary">Enviar</button>
                                    </div>
                                </form>
                            </div>
                        @endif


                        @if(!empty($galeria))
                            <div class="container" style="display: flex;">
                                @for($i=0; $i < count($galeria); $i++)
                                    <!-- Verifica se é o prestador -->
                                    @if(auth()->user()->id == $id)

                                    
                                        <div class="card" style="padding: 8px; margin:13px;">
                                            <div class="card">
                                                <img class="card-img-top" src="/img/galeria/{{$galeria[$i]->image}}" style="width: 280px; height: 280px" data-holder-rendered="true">
                                                <small style="padding-left:7px;" class="text-muted">{{date('d/m/Y', strtotime($galeria[$i]->created_at));}}</small>
                                                <div class="card-body" style="width: 280px;">
                                                    <p class="card-text">Comentário: {{$galeria[$i]->comentario}}</p>
                                                </div>
                                                <div  style="display: flex; align-items:center; justify-content:center;">
                                                    <div class="btn-group">
                                                        
                                                        @if(auth()->user()->id == $id)
                                                            <button type="button" class="btn btn-primary" onclick="confirmar_exclusao(<?php echo $galeria[$i]->id ?>)">Excluir</button>
                                                        @endif
    
                                                        @if(auth()->user()->id == $id)
                                                            <button type="button"  type="button" class="btn btn-primary" onclick="editar_comentario(<?php echo $galeria[$i]->id ?>)" class="btn btn-primary">Editar</button>
                                                            <button class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl" onclick="foto(<?php echo $galeria[$i]->id ?>)">Abrir</button>
                                                            @if($galeria[$i]->status == 1)
                                                                <button type="button" type="button" class="btn btn-primary">
                                                                    <img width="20px" src="/icons/eye-fill.svg" onclick="nao_exibir(<?php echo $galeria[$i]->id ?>)" class="icon-space">
                                                                </button>
                                                            @else
                                                                <button type="button" type="button" class="btn btn-primary">
                                                                    <img width="20px" src="/icons/eye-slash-fill.svg" onclick="exibir(<?php echo $galeria[$i]->id ?>)" class="icon-space">
                                                                </button>
                                                            @endif
                                                        @endif
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                    @if($galeria[$i]->status == 1)
                                        <div class="card" style="padding: 8px; margin:13px;">
                                            <div class="card">
                                                <img class="card-img-top" src="/img/galeria/{{$galeria[$i]->image}}" style="width: 280px; height: 280px" data-holder-rendered="true">
                                                <small style="padding-left:5px;" class="text-muted">{{date('d/m/Y', strtotime($galeria[$i]->created_at));}}</small>
                                                <div class="card-body" style="width: 280px;">
                                                    <p class="card-text">Comentário: {{$galeria[$i]->comentario}}</p>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl" onclick="foto(<?php echo $galeria[$i]->id ?>)">Abrir</button>
        
                                        </div>
                                        
                                        @endif
                                    @endif
                                @endfor              
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endif
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