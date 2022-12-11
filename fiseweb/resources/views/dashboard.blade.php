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
                <h2 class="mt-5 text-center">Quantidade de visualizações</h2>
            </div>
            <br>
            <!-- GRAFICO DE LINHA E BARRA -->
            <div id="grafico" class="col-lg-8" style="margin: auto;">
                <canvas id="myChart"></canvas>
                <canvas id="myChart1"></canvas>
            </div>
            <div class="row mt-5">
                <h2 class="avaliacao text-center" name="avaliacao" id="avaliacao" hidden>Avaliações</h2>
            </div>
            <br>

            <!-- GRAFICO DE ROSCA -->
            <div id="grafico_rosca" class="col-lg-8 mt-2" style="margin: auto;">
            </div>
        </div>
        
        <footer class="py-2">
        
            <div class="d-flex justify-content-between py-4 my-4 border-top">
            <p>© 2022 Company, Inc. All rights reserved.</p>
            <ul class="list-unstyled d-flex">
                <li class="ms-3"><a class="link-dark" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" style="color:blue;" height="35" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                    </svg>
                </a></li>
                <li class="ms-3"><a class="link-dark" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                    </svg>
                </a></li>
                <li class="ms-3"><a class="link-dark" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" style="color:red;" width="35" height="35" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
                        <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"/>
                    </svg></a></li>
            </ul>
            </div>
        </footer>

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
                    var cont_nota = 0;

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
                        cont_nota+=1;
                    }
                    if(grafico[0].NOTA1)
                    {
                        avaliacao_rosca.push(grafico[0].NOTA1);
                        label_rosca.push('Nota 1')
                        cont_nota+=1;
                    }
                    if(grafico[0].NOTA2)
                    {
                        avaliacao_rosca.push(grafico[0].NOTA2);
                        label_rosca.push('Nota 2')
                        cont_nota+=1;
                    }
                    if(grafico[0].NOTA3)
                    {
                        avaliacao_rosca.push(grafico[0].NOTA3);
                        label_rosca.push('Nota 3')
                        cont_nota+=1;
                    }
                    if(grafico[0].NOTA4)
                    {
                        avaliacao_rosca.push(grafico[0].NOTA4);
                        label_rosca.push('Nota 4')
                        cont_nota+=1;
                    }
                    if(grafico[0].NOTA5)
                    {
                        avaliacao_rosca.push(grafico[0].NOTA5);
                        label_rosca.push('Nota 5')
                        cont_nota+=1;
                    }
                    if(cont_nota== 0)
                        $('#avaliacao').prop('hidden',true);
                    else
                        $('#avaliacao').prop('hidden',false);
                    

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
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            }
                        };

                        const myChart = new Chart(
                            document.getElementById('myChart'),
                            config
                        );
                    }
                    // GRAFICO ESTILO BARRA
                    if(tipo == 1){
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
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
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