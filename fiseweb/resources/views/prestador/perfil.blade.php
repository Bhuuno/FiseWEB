    @extends('layouts.padrao')
    <link href="{{asset('css/perfil_prestador.css')}}" rel="stylesheet">
    @section('titulo', 'Perfil Prestador')
    <x-app-layout>
    <x-slot name="header">
        <button class="btn buttoncor" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            <img src="/icons/list.svg" class="img-button">  
        </button>         
          <h2 class="d-inline p-4">PERFIL PRESTADOR</h2>
    </x-slot>
    
    <!-- menu projeto -->
    @extends('layouts.menu')

    <div class="container">
        <div class="">
            <div class="row gutters-md p-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="/img/fotos_perfil/{{$prestador[0]->image}}" alt="{{$prestador[0]->nome}}" class="rounded-circle" style="width:144px; height:144px";>
                                <div class="mt-3">
                                    <h4>{{$prestador[0]->nome}}</h4>
                                    <h6>{{strtoupper($prestador[0]->profissao)}}</h6>
                                    <div style="display: flex; justify-content:center;" >   
                                    <p id="media">0</p>
                                        <a href="/dashboard/avaliacao/{{$id}}?id=${{$id}}">
                                            <img style="height: fit-content; padding: 2px;"width="25px" src="/img/star1.png">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="2" y1="12" x2="22" y2="12"></line>
                                    <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                </svg>
                                Website
                            </h6>
                            <span class="text-secondary">{{empty($prestador[0]->website) ? 'https://bootdey.com' : $prestador[0]->website}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline">
                                    <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                                </svg>
                                Github
                            </h6>
                            <span class="text-secondary">{{empty($prestador[0]->github) ? 'bootdey' : $prestador[0]->github}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info">
                                    <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                                </svg>
                                Twitter
                            </h6>
                            <span class="text-secondary">{{empty($prestador[0]->twitter) ? '@bootdey' : $prestador[0]->twitter}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger">
                                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                </svg>
                                Instagram
                            </h6>
                            <span class="text-secondary">{{empty($prestador[0]->instagram) ? 'bootdey' : $prestador[0]->instagram}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary">
                                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                </svg>
                                Facebook
                            </h6>
                            <span class="text-secondary">{{empty($prestador[0]->facebook) ? 'bootdey' : $prestador[0]->facebook}}</span>
                        </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Razão Social</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$prestador[0]->razao_social}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$prestador[0]->email}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Telefone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$prestador[0]->telefone}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Celular</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$prestador[0]->telefone}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Endereço</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$prestador[0]->endereco}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row gutters-sm">
                        <div class="col-sm-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">SOFT SKILL</i></h6>
                                    @if(isset($prestador[0]->primeiroSoftskill))
                                        <small>{{$prestador[0]->primeiroSoftskill}}</small>
                                        <div class="progress mb-3" style="height: 5px">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: {{$prestador[0]->porcentagemPrimeiroSoftskill}}%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    @endif
                                    @if(isset($prestador[0]->segundoSoftskill))
                                        <small>{{$prestador[0]->segundoSoftskill}}</small>
                                        <div class="progress mb-3" style="height: 5px">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: {{$prestador[0]->porcentagemSegundoSoftskill}}%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    @endif
                                    @if(isset($prestador[0]->terceiroSoftskill))
                                        <small>{{$prestador[0]->terceiroSoftskill}}</small>
                                        <div class="progress mb-3" style="height: 5px">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: {{$prestador[0]->porcentagemTerceiroSoftskill}}%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    @endif
                                    @if(isset($prestador[0]->quartoSoftskill))
                                        <small>{{$prestador[0]->quartoSoftskill}}</small>
                                        <div class="progress mb-3" style="height: 5px">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: {{$prestador[0]->porcentagemQuartoSoftskill}}%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    @endif
                                    @if(isset($prestador[0]->quintoSoftskill))
                                        <small>{{$prestador[0]->quintoSoftskill}}</small>
                                        <div class="progress mb-3" style="height: 5px">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: {{$prestador[0]->porcentagemQuintoSoftskill}}%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">HABILIDADES</i></h6>
                                    @if(isset($prestador[0]->primeiroHabilidade))
                                        <small>{{$prestador[0]->primeiroHabilidade}}</small>
                                        <div class="progress mb-3" style="height: 5px">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: {{$prestador[0]->porcentagemPrimeiroHabilidade}}%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    @endif
                                    @if(isset($prestador[0]->segundoHabilidade))
                                        <small>{{$prestador[0]->segundoHabilidade}}</small>
                                        <div class="progress mb-3" style="height: 5px">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: {{$prestador[0]->porcentagemSegundoHabilidade}}%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    @endif
                                    @if(isset($prestador[0]->terceiroHabilidade))
                                        <small>{{$prestador[0]->terceiroHabilidade}}</small>
                                        <div class="progress mb-3" style="height: 5px">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: {{$prestador[0]->porcentagemTerceiroHabilidade}}%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    @endif
                                    @if(isset($prestador[0]->quartoHabilidade))
                                        <small>{{$prestador[0]->quartoHabilidade}}</small>
                                        <div class="progress mb-3" style="height: 5px">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: {{$prestador[0]->porcentagemQuartoHabilidade}}%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    @endif
                                    @if(isset($prestador[0]->quintoHabilidade))
                                        <small>{{$prestador[0]->quintoHabilidade}}</small>
                                        <div class="progress mb-3" style="height: 5px">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: {{$prestador[0]->porcentagemQuintoHabilidade}}%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    @endif
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 mt-2">
                    <div class="card h-100">
                        <div class="card-body">
                            <small>Sobre</small>
                            <div class="col-sm-9 text-secondary">
                                {{$prestador[0]->sobre}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 mt-2">
                    <div class="card h-100">
                        <div class="card-body">
                            <small>Informações</small>
                            <div class="col-sm-9 text-secondary">
                                {{$prestador[0]->informacao}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 mt-2">
                    <div class="card h-100">
                        <div class="card-body">
                            <small>Experiência</small>
                            <div class="col-sm-9 text-secondary">
                                {{$prestador[0]->experiencia}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
          
</x-app-layout>
<script type="text/javascript">
    window.onload = function(){
        // Realiza contagem para criação de grafico no dashboard
        var id_prestador = '<?=$prestador[0]->user_id?>';
        var id_cliente = '<?=$request["user_id"] = auth()->user()->id;?>';
        $.ajax({
            url: '/visualizacao',
            type: 'GET',
            data: {
                prestador:id_prestador,
                cliente:id_cliente
            },
            success: function( result ) {  
            },
            error: function( request, status, error ) {
                console.log(request,status,error);
            }
        });


        var id = <?php echo $id; ?>

        $.ajax({
                url: '/media',
                type: 'get',
                data: {
                    id:id
                },
                success: function( result ) {  
                    resposta = JSON.parse(result);

                    media = resposta[0].total_nota / resposta[0].qtde_avaliacao;

                    console.log(media);

                    //ALETRA O VALOR DA MEDIA
                    if(resposta[0].total_nota != null)
                        document.getElementById('media').innerHTML = media.toFixed(1)
                },
                error: function( request, status, error ) {
                    console.log(request,status,error);
                }
                
        });
    };
    

</script>


