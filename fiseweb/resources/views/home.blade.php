@extends('layouts.padrao')

@section('titulo', 'FiseWEB')

@section('conteudo')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="container p-4">
                        @foreach ($prestadores as $prestador)
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-3 border border-dark text-center">
                                    <img src="/img/fotos_perfil/{{$prestador->image}}" class="img-fluid" alt="...">
                                    <p class="bg-warning">{{$prestador->profissao}}</p>
                                    <p>COLOCAR ESTRELA</p>
                                </div>
                                <div class="col-md-9">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$prestador->nome}}</h5>
                                        <p class="card-text">Expecialidade: {{$prestador->especialidade}}</p>
                                        <p class="card-text">Contato: {{$prestador->celular}}</p>
                                        <p class="card-text"><small class="text-muted">Parceiro desde 30/02/2022</small></p>
                                    </div>
                                </div>
                        @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
