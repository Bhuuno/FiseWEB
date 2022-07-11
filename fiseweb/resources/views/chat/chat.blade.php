@extends('layouts.padrao')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('chat') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex" style="min-height: 400px;">
                <!-- <div class="p-6 bg-white border-b border-gray-200"> -->
                    <!-- Lista de usuários -->
                    <div class="w-3/12 bg-gray-200 bg-opacity-25 border-r border-gray-200">
                        <ul>
                            <li class="p-6 text-lg text-gray-600 leading-7 font-semibold border-gray-200 hover:gray hover:bg-opacity-50 hover:cursor-pointer" >
                                <p>Matheus Bote</p>
                            </li>
                            
                            <li class="p-6 text-lg text-gray-600 leading-7 font-semibold border-gray-200 hover:gray hover:bg-opacity-50 hover:cursor-pointer" >
                                <p>Lucas Isamu</p>
                            </li>
                            <li class="p-6 text-lg text-gray-600 leading-7 font-semibold border-gray-200 hover:gray hover:bg-opacity-50 hover:cursor-pointer" >
                                <p>João Amaro</p>
                            </li>
                        </ul>

                    </div>
                    <!-- mensagens -->
                    <div class="w-9/12">
                        <form>
                            <input type="text">
                            <button>Enviar</button>
                        </form>
                    </div>
                <!-- </div> -->
            </div>
        </div>
    </div>
</x-app-layout>
