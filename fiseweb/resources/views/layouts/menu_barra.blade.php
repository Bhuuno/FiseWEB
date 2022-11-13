<?php
    $id = $_GET['id'];
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
        <a href="/dashboard?id={{$id}}" class="nav-link link-dark text-dark">Dashboard</a>
        <a href="/dashboard/prestador/{{auth()->user()->id;}}?id={{auth()->user()->id;}}" class="nav-link link-dark text-dark">Perfil Profissional</a>
        
        <a class="nav-item nav-link disabled" href="#">Disabled</a>
    </div>
  </div>
</nav>
