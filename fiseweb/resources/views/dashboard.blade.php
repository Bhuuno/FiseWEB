@extends('layouts.padrao')
<link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
@section('titulo', 'Dashboard')
<script src="{{ asset('chats/Chart.js') }}"></script>   
<x-app-layout>
    <x-slot name="header">
        <button class="btn btn-dark p-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            <img src="/icons/list.svg" class="icon-space d-flex">  
          </button>        
          <h2 class="d-inline p-4">DASHBOARD</h2>
    </x-slot>

    <div class="container">
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
                </div>
                <div class="row m-1 p-3" style="width:100%; height:60%;">
                    <div class="container text-center">
                        <div class="row mt-3" style="height:80px;">
                            <div class="col-2 barra">
                                Visualização Semanal
                                <div id="semanal">0</div>
                            </div>
                            <div class="col-2 barra">
                                Visualização Mensal
                                <div id="mensal">0</div>
                            </div>
                            <div class="col-2 barra">
                                TOTAL Visualização
                                <div id="total">0</div>
                            </div>
                            <div class="col-2 barra">
                                TOTAL avaliações
                                <div id="avaliacoes">0</div>
                            </div>
                            <div class="col-2 barra">
                                Fotos TOTAL
                                <div>0</div>
                            </div>
                            <div class="col-2 barra">
                                Pontuação
                                <div style="display: flex; justify-content:center;">
                                    <div id="media">0</div>
                                    <img style="height: fit-content; padding: 2px;"width="25px" src="/img/star1.png">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3 input-grafico">
                        <label class="m-2" for="dias">Dias:</label>
                        <input class="input_grafico_dias" id="dias" name="dias" type="text" value="5">
                        
                        <label class="m-2" for="tipo">Tipo:</label>
                        <select class="select_grafico" required class="form-select" id="tipo" name="tipo" aria-label="Default select example">
                            <option selected value="0">Linha</option>
                            <option value="1">Barra</option>
                        </select>
                        
                        <input class="input_grafico ms-3" id="data" name="data" type="date">
                        <input class="button_grafico ms-4" id="buscar" type="button" value="Gerar" onclick="grafico_visualizacao()">
                    </div>
                    <div style="display: flex;">
                        <!-- GRAFICO DE LINHA E BARRA -->
                        <div id="grafico" style="display:flex; width:64%;">
                        
                            <canvas id="myChart"></canvas>
                            <canvas id="myChart1"></canvas>
                        </div>

                        <!-- GRAFICO DE ROSCA -->
                        <div id="grafico_rosca" style="display:flex; width:60%;">
                            <p>Visualização de Perfil</p>
                        </div>
                    </div>
                </div>

            </div>
            
        </div>
    </div>

</x-app-layout>
<script>

    // ALERTA MENSAGEM 
   function valor_negativo_atencao(){
        swal({
            title: "Atenção!",
            text: "Digitar um valor positivo!",
            icon: "warning",
            button: "Fechar!",
        });
    };
    // ALERTA MENSAGEM
    function acima_30_dias_atencao(){
        swal({
            title: "Atenção!",
            text: "Busca de até 30 dias!",
            icon: "warning",
            button: "Fechar!",
        });
    };
    window.onload = function(){
        $("#myChart").remove();
        document.getElementById('grafico').innerHTML='<canvas id="myChart"></canvas>';
        grafico_visualizacao();
        visualizacao_dashboard();
    }
    function visualizacao_dashboard(){
        $.ajax({
            url: '/informacoes/dashboard',
            type: 'get',
            data: {
            },
            success: function( result ) {  
                var dashboard = JSON.parse(result);

                //EXIBIR O VALOR NO DASHBOARD SEMANAL 
                document.getElementById('semanal').innerHTML = dashboard[0].semanal
                
                //EXIBIR O VALOR NO DASHBOARD MENSAL 
                document.getElementById('mensal').innerHTML = dashboard[0].mensal

                //EXIBIR O VALOR NO DASHBOARD TOTAL 
                document.getElementById('total').innerHTML = dashboard[0].total_visualizacao
                
                //EXIBIR O VALOR NO COMENTARIOS TOTAL 
                document.getElementById('avaliacoes').innerHTML = dashboard[0].total_avaliacoes
                
                //EXIBIR O VALOR NO PONTUAÇÃO TOTAL 
                document.getElementById('media').innerHTML = dashboard[0].media.toFixed(1)
            },
            error: function( request, status, error ) {
                console.log(request,status,error);
            }
        });
    }
    function grafico_visualizacao(){
        var data = $("#data").val();
        var dias = $("#dias").val();
        var tipo = $("#tipo").val();
        var id_prestador = '<?=$request["user_id"] = auth()->user()->id;?>';

        if(dias < 0)
            valor_negativo_atencao();

        if(dias <= 30)
        {
            $.ajax({
                url: '/visualizacao/grafico',
                type: 'get',
                data: {
                    prestador:id_prestador,
                    dias:dias,
                    data:data
                },
                success: function( result ) {  
                    var grafico = JSON.parse(result);

                    // console.log(grafico[0].quantidade);
                    var label=[];
                    var label_rosca=[];
                    var avaliacao_rosca = [];
                    var valores=[];
                    var i;

                    //MONTA UM ARRAY PRO GRAFICO DE ROSCA COM A QUANTIDADE DE AVALIAÇÕES
                    for(i=0; i< grafico.length; i++)
                    {
                        label.push(grafico[i].data);
                        valores.push(grafico[i].quantidade);
                    }
                    if(grafico[0].NOTA0)
                    {
                        avaliacao_rosca.push(grafico[0].NOTA0);
                        label_rosca.push('Nota 0')
                    }
                    if(grafico[0].NOTA1)
                    {
                        avaliacao_rosca.push(grafico[0].NOTA1);
                        label_rosca.push('Nota 1')
                    }
                    if(grafico[0].NOTA2)
                    {
                        avaliacao_rosca.push(grafico[0].NOTA2);
                        label_rosca.push('Nota 2')
                    }
                    if(grafico[0].NOTA3)
                    {
                        avaliacao_rosca.push(grafico[0].NOTA3);
                        label_rosca.push('Nota 3')
                    }
                    if(grafico[0].NOTA4)
                    {
                        avaliacao_rosca.push(grafico[0].NOTA4);
                        label_rosca.push('Nota 4')
                    }
                    if(grafico[0].NOTA5)
                    {
                        avaliacao_rosca.push(grafico[0].NOTA5);
                        label_rosca.push('Nota 5')
                    }


                    //GRAFICO DE LINHA 
                    if(tipo == 0)
                    {
                        $("#myChart").remove();
                        document.getElementById('grafico').innerHTML='<canvas id="myChart"></canvas>';

                        const labels = label;

                        const data = {
                            labels: labels,
                            datasets: [{
                            label: 'Visualizações no perfil',
                            backgroundColor: 'rgb(255, 99, 132)',
                            borderColor: 'rgb(255, 99, 132)',
                            data: valores,
                            }]
                        };

                        const config = {
                            type: 'line',
                            data: data,
                            options: {}
                        };

                        const myChart = new Chart(
                            document.getElementById('myChart'),
                            config
                        );
                    // GRAFICO ESTILO BARRA
                    }if(tipo == 1){
                        $("#myChart").remove();
                        document.getElementById('grafico').innerHTML='<canvas id="myChart"></canvas>';
                        const ctx = document.getElementById('myChart').getContext('2d');
                        const myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: label,
                                datasets: [{
                                    label: 'Visualizações de Perfil',
                                    data: valores,
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
                                indexAxis: 'y',
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    }
                    //GRAFICO DE ROSCA 
                    document.getElementById('grafico_rosca').innerHTML='<canvas id="myChart2"></canvas>';
                        const ctx = document.getElementById('myChart2').getContext('2d');
                        const myChart = new Chart(ctx, {
                            type: 'doughnut',
                            data: {
                                labels: label_rosca,
                                datasets: [{
                                    label: 'Avaliações',
                                    data: avaliacao_rosca,
                                    backgroundColor: [
                                        '#000',
                                        '#999',
                                        '#ccc'
                                    ],
                                    borderColor: [
                                        '#000',
                                        '#999',
                                        '#ccc'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                indexAxis: 'y',
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });

                },
                error: function( request, status, error ) {
                    console.log(request,status,error);
                }
            });
        }else
            acima_30_dias_atencao();
    };
</script>