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
                <div class="p-6 bg-white border-b border-gray-200 d-flex">

                    <div class="container p-4">
                        <div class="card mb-3" style="max-width: 735px;">
                            <div class="row g-0">
                                <div class="col-md-4 border border-dark text-center">
                                    <img src="img/paisagem1.jpg" class="img-fluid" alt="...">
                                    <p class="bg-warning">Especialidade do ignorante</p>
                                    <p>Informações desnecessarias</p>
                                </div>

                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Nome do infeliz</h5>
                                        <p class="card-text">Experiência do desgraçado:</p>
                                        <p class="card-text">Contato da mula: (00) 0000-0000</p>
                                        <p class="card-text"><small class="text-muted">Parceiro desde 30/02/2022</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="">
                        <form class="border border-dark p-4">
                            <fieldset>
                                <legend>Filtrar</legend>
                                <div class="mb-3">
                                    <label for="estado" class="form-label">Estado</label>
                                    <select id="estado" class="form-select">
                                        <option>Todos</option>
                                        <option>Acre</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="cidade" class="form-label">Cidade</label>
                                    <select id="cidade" class="form-select">
                                        <option>Todas</option>
                                        <option>Rio Branco</option>
                                    </select>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Aplicar</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
