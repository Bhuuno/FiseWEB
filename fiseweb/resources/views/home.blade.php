@extends('layouts.padrao')

@section('titulo', 'FiseWEB')

@section('conteudo')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>
    <div id="carouselExampleCaptions" height="30px" class="carousel slide" data-bs-ride="false">
        <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/img/menu.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/img/menu.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/img/menu.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <br>
    <div id="search-container" class="col-md-7 container">
        <h2 style="text-align:center">Busque um Prestador</h2>
        <form action="/" method="GET">
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
        </form>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="container p-4">
                        @foreach ($prestadores as $prestador)
                        <div class="card mb-3">
                            @if($search)
                                <h2>Buscando por: {{$search}}</h2>
                            @else
                                <p>COLOCAR ALGUMA COISA</p>
                            @endif
                            <div class="row g-0">
                                <div class="col-md-4 border border-dark text-center">
                                    <img src="/img/fotos_perfil/{{$prestador->image}}" class="img-fluid" alt="...">
                                    <p class="bg-warning">{{$prestador->profissao}}</p>
                                    <p>COLOCAR ESTRELA</p>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$prestador->nome}}</h5>
                                        <p class="card-text">Expecialidade: {{$prestador->especialidade}}</p>
                                        <p class="card-text">Contato: {{$prestador->celular}}</p>
                                        <p class="card-text"><small class="text-muted">Parceiro desde 30/02/2022</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @if(count($prestadores) == 0 && $search)
                            <p>Não foi possível encontrar nenhum prestador com {{$search}}! <a href="/">Ver todos!</a></p>
                        @elseif(count($prestadores) == 0)
                            <p>Não há Prestadores Cadastrado!</p>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
