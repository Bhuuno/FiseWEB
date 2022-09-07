@extends('layouts.padrao')
<link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
@section('titulo', 'Dashboard')
<script src="{{ asset('chats/Chart.js') }}"></script>   
<x-app-layout>
    <x-slot name="header">
      <button class="btn btn-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
        <img src="/icons/list.svg" class="icon-space d-flex">  
      </button>        
      <h2 class="d-inline p-4">DASHBOARD</h2>
    </div>
        
    </x-slot>


   
      
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
</x-app-layout>
