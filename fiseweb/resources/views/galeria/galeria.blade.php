@extends('layouts.padrao')
<link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
@section('titulo', 'Galeria')
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
                                        <input type="file" class="form-control-file" id="imagem" name="imagem">
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
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card mb-4 shadow-sm">
                                        <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22348%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20348%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_182b8b7398c%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A17pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_182b8b7398c%22%3E%3Crect%20width%3D%22348%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22116.71249771118164%22%20y%3D%22120.18000011444092%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
                                        <div class="card-body">
                                            <p class="card-text">Este é um card maior e que suporta texto abaixo, como uma introdução mais natural ao conteúdo adicional.</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-outline-secondary">Ver</button>
                                                <button type="button" class="btn btn-sm btn-outline-secondary">Editar</button>
                                            </div>
                                            <small class="text-muted">9 mins</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>