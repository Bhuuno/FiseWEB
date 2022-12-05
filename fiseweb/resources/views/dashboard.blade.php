@extends('layouts.padrao')
<link href="{{asset('css/dashboard.css')}}" rel="stylesheet">

<script>
        // serve para chamar as fuções que quero que inicie
        window.onload = function(){

        if('<?php print auth()->user()->role ?>' == 'prestador' && '<?php print $_GET['id'] ?>' == '<?php print auth()->user()->id ?>')
        {
            swal({
                title: "Informativo",
                text: "Seu nível de perfil não possui permissão!",
                icon: "info"
            })
        }
    };
</script>

@if(auth()->user()->role == 'prestador')
    @section('titulo', 'Dashboard')
    <script src="{{ asset('chats/Chart.js') }}"></script>   
    <x-app-layout>
        <x-slot name="header">
            <button class="btn buttoncor" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <img src="/icons/list.svg" class="img-button">  
            </button>         
            <h2 class="font-semibold text-xl text-gray-800 leading-tight d-inline p-3">
                DASHBOARD
            </h2>
        </x-slot>
        <!-- menu projeto -->
        @extends('layouts.menu')

        <div class="container">
            <div class="text-center rounded bg-white mt-5 mb-5">
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
                        Total de Visualização
                        <div id="total">0</div>
                    </div>
                    <div class="col-2 barra">
                        Total de Avaliações
                        <div id="avaliacoes">0</div>
                    </div>
                    <div class="col-2 barra">
                        Total de Fotos 
                        <div id="qtde_fotos">0</div>
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

            <div class="mt-3 input-grafico col-sm-9">
                <label class="m-2" for="dias">Dias:</label>
                <input class="input_grafico_dias  col-sm-1" id="dias" name="dias" type="text" value="5">
                
                <label class="m-2" for="tipo">Tipo:</label>
                <select class="select_grafico col-sm-1" required class="form-select" id="tipo" name="tipo" aria-label="Default select example">
                    <option selected value="0">Linha</option>
                    <option value="1">Barra</option>
                </select>
                
                <input class="input_grafico ms-3 col-sm-2" id="data" name="data" type="date">
                <input class="button_grafico ms-4 col-sm-2" id="buscar" type="button" value="Gerar" onclick="grafico_visualizacao()">
            </div>
            <div class="row">

            
            <div class="row">
                <h2 class="text-center mt-5">Quantidade de visualizações</h2>
            </div>
            <br>
            <!-- GRAFICO DE LINHA E BARRA -->
            <div id="grafico" class="row">
                <canvas id="myChart"></canvas>
                <canvas id="myChart1"></canvas>
            </div>
                
            <div class="row">
                <h2 class="text-center mt-5">Avaliações</h2>
            </div>
            <br>

            <!-- GRAFICO DE ROSCA -->
            <div id="grafico_rosca" class="row">
            </div>
            </div>
        </div>
    </x-app-layout>
@endif
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
    
                //se a média vem com valor null, recebe 0
                if( dashboard[0].media == null)
                    dashboard[0].media = 0;

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

                //EXIBIR A QUANTIDADE DE FOTOS POSTADAS
                document.getElementById('qtde_fotos').innerHTML = dashboard[0].qtde_fotos
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

        
        console.log("2");
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