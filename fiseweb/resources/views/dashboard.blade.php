@extends('layouts.padrao')

@section('titulo', 'Cadastro')
<script src="{{ asset('chats/Chart.js') }}"></script>   

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
                        <li class="d-flex"><img src="/icons/star-half.svg" class="icon-space">Avaliações</li>
                        <hr>
                        <li class="d-flex"><img src="/icons/wrench-adjustable.svg" class="icon-space">Suporte</li>
                        <hr>
                        <li class="d-flex"><img src="/icons/gear-fill.svg" class="icon-space">Configurações</li>
                        <hr>
                    </ul>
                    </div>
                </div>

                <div style="width:40%; height:40%">
                    <canvas id="myChart"></canvas>
                </div>

            </div>
            
        </div>
    </div>

</x-app-layout>
<script>
    window.onload = function(){
        var id_cliente = '<?=$request["user_id"] = auth()->user()->id;?>';
        $.ajax({
            url: '/visualizacao',
            type: 'GET',
            data: {
                cliente:id_cliente
            },
            success: function( result ) {  
                console.log(result);
            },
            error: function( request, status, error ) {
                console.log(request,status,error);
            }
        });
    };

const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>