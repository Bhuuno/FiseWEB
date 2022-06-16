@extends('layouts.padrao')

@section('titulo', 'FiseWEB')

@section('conteudo')

  <div class="barra">
      <h1 class="logo_barra">Fise<span class="logo_barra">WEB</span></h1>
  </div>
  <div class="barra_menu position-relative">
    <div class="menu position-absolute top-0 start-0">
      <ul class="nav menu nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link">Disabled</a>
        </li>
      </ul>
    </div>
    <div class="button position-absolute top-0 end-0">
      <button type="button" class="btn acesso btn-warning">Entrar</button>
      <button type="button" class="btn acesso btn-warning">Registrar</button>
    </div>
  </div>

  <div class="portfolio">
  </div>

@endsection