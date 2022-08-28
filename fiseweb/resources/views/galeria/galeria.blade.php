@extends('layouts.padrao')

@method('path')

@section('titulo', 'Galeria')

<link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
<script src="{{ asset('chats/Chart.js') }}"></script>   
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
                                <form action="{{route('galeria.store')}}" method="post" enctype="multipart/form-data" class="bg-white shadow row g-4 pb-8">
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
                                        <button type="submit" class="btn btn-primary">Enviar</button>
                                    </div>
                                </form>
                            </div>
                        @endif
                        @if(!empty($galeria))
                            <div class="container">
                                <div class="row">
                                    @foreach($galeria as $item)
                                        <div class="col-md-4">
                                            <div class="card mb-4 shadow-sm">
                                                <img class="card-img-top" src="/img/galeria/{{$item->image}}" width="60%" height="60%" data-holder-rendered="true">
                                                <div class="card-body">
                                                    <p class="card-text">Comentário: {{$item->comentario}}</p>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="btn-group">
                                                        
                                                        <form action="{{route('galeria.destroy',$item->id)}}" method="POST">
                                                            @csrf
                                                            @Method("DELETE")   
                                                            <!-- <x-button>Excluir</x-button> -->
                                                            <button type="submit" class="btn btn-sm btn-outline-secondary" onclick="mensagem()">Excluir</button>
                                                        </form>
                                                        <button type="submit" class="btn btn-sm btn-outline-secondary">Editar</button>
                                                    </div>
                                                    <small class="text-muted">{{date('d-m-Y', strtotime($item->created_at));}}</small>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
        function mensagem(){
        swal({
            title: "Exclusão!",
            text: "Você deseja remover a imagem?",
            icon: "warning",
            
            buttons: {
            btn1: "Confirmar exclusão (Essa ação não é recomendada \n, <small>Deletar este colaborador pode acarretar em inconsistencias nos dados anteriores, você pode torna-lo inativo, ou registrar um desligamento de funcionário.</small>.",
            btn2: "Cancelar"
        },
        })
        .then((value) => {
        switch (value) {

            case "btn1":
            return true;
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