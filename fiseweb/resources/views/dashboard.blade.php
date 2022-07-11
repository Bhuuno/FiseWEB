@extends('layouts.padrao')

@section('titulo', 'Cadastro')

@section('conteudo')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Perfil') }}
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
                        
                        <a href="/dashboard" class="text-decoration-none text-white">
                        <li class="d-flex" href="/dashboard"><img src="/icons/house-door.svg" class="icon-space"> Home <li>
                        <hr>
                        </a>
                        <li class="d-flex"><img src="/icons/chat-dots.svg" class="icon-space">Chat</li>
                        <hr>
                        <li class="d-flex"><img src="/icons/briefcase.svg" class="icon-space">Serviços</li>
                        <hr>
                        <li class="d-flex"><img src="/icons/journal-bookmark.svg" class="icon-space">Agenda</li>
                        <hr>
                        <li class="d-flex"><img src="/icons/star-half.svg" class="icon-space">Avaliações</li>
                        <hr>
                        <li class="d-flex"><img src="/icons/wrench-adjustable.svg" class="icon-space">Suporte</li>
                        <hr>
                        <li class="d-flex"><img src="/icons/gear-fill.svg" class="icon-space">Configurações</li>
                        <hr>
                    </ul>
                    </div>
                </div>
                <div class="col py-3">
                    <h3>Gráfico</h3>
                </div>
            </div>
            
        </div>
    </div>

</x-app-layout>