@extends('layouts.padrao')
    <link href="{{asset('css/perfil.css')}}" rel="stylesheet">
@section('titulo', 'Cadastro')

@section('conteudo')

<script>
    //Aqui informa a mensagem inicial, tem que ficar no topo para funcionar
    window.onload = function(e){ 
        if('<?php print $perfil; ?>' == 'cliente')
        {
            swal({
                title: "Informativo",
                text: "Caso você queira apenas utilizar a ferramenta para encontrar prestador, faça um cadastro pessoal!",
                icon: "info"
            })
        }
    }
</script>

<x-app-layout>
    <x-slot name="header">
        <button class="btn btn-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            <img src="/icons/list.svg" class="icon-space d-flex">  
        </button>        
        <h2 class="font-semibold text-xl text-gray-800 leading-tight d-inline p-3">
            PERFIL
        </h2>

    </x-slot>

    <div class="container-fluid">
    <!-- menu projeto -->

    @extends('layouts.menu')
    <script src="{{ asset('js/jquery-3.3.1.slim.min.js') }}"></script>
    <script src="{{ asset('jquery/bootstrap.min.js') }}"></script>


    @if(session('msg'))
        @if(session('msg') == 'cadastro alterado')
            <script>
                window.onload = function(){
                    swal({
                        title: "Alteração!",
                        text: "Cadastro alterado com sucesso!",
                        icon: "success"
                    })
                }
            </script>
        @endif
        @if(session('msg') == 'cadastro criado')
            <script>
                window.onload = function(){
                    swal({
                        title: "Parabéns!",
                        text: "Cadastro Criado com sucesso!",
                        icon: "success"
                    })
                }
            </script>
        @endif
        @if(session('msg') == 'erro alterar')
            <script>
                window.onload = function(){
                    swal({
                        title: "Erro!",
                        text: "Não foi possivel alterar cadastro, por favor informar a equipe de suporte FiseWEB",
                        icon: "error"
                    })
                }
            </script>
        @endif
    @endif

    <div class="tab container">
    <input type="radio" name="tabs" id="tab1" checked>
    <label for="tab1">Perfil Pessoal</label>
    <input type="radio" name="tabs" id="tab2">
    <label for="tab2">Perfil Profissional</label>
    <div class="tabs">
        @if(!isset($pessoa))
            <div class="content">
                <div class="container-fluid rounded bg-white mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-3 border-right">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">Edogaru</span><span class="text-black-50">edogaru@mail.com.my</span><span> </span></div>
                        </div>
                        <div class="col-md-9 border-right"> 
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right"><kbd>Cadastrar</kbd> - Dados Perfil Pessoa</h4>
                                </div>
                                <form action="{{route('pessoa.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mt-2">
                                        <div class="form-group">
                                            <label for="image">Imagem de perfil: </label>
                                            <input type="file" class="form-control-file" id="image" name="image">
                                        </div>
                                        <div class="col-md-6">    
                                            <label class="labels">
                                                Nome Completo
                                            </label>
                                            <input type="text" required name="nome" class="form-control" id="nome" placeholder="Nome">
                                        </div>
                                        <div class="col-md-3"><label for="est_civil" class="labels">Estado Civil</label>
                                            <select required class="form-select" name="estado_civil" aria-label="Default select example">
                                                <option selected value="Solteiro">Solteiro</option>
                                                <option value="Casado">Casado</option>
                                                <option value="Viúvo">Viúvo</option>
                                                <option value="Divorciado">Divorciado</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3"> 
                                            <label for="nascimento" class="labels">Data de Nascimento</label>
                                            <input type="date" required name="data_nascimento" class="form-control" id="nascimento"></div>
                                        </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <label class="labels">Celular</label>
                                            <input type="tel" class="form-control" name="celular" id="celular" placeholder="(00)00000-0000">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="email" class="labels">E-mail</label>
                                            <input type="mail" required class="form-control" name="email" id="email" placeholder="teste@exemplo.com"></div>
                                        <div class="col-md-6">
                                            <label for="rg" class="form-label">RG</label>
                                            <input type="text" class="form-control" data-mask="000.00.000-0" name="rg" id="rg" placeholder="Ex: 000.000.000-00">
                                        </div>
                            
                                        <div class="col-md-6">
                                            <label for="cpf" name="exemplo" id="exemplo" class="form-label">CPF</label>
                                            <input type="text" required name="cpf" class="form-control" id="cpf" maxlength='11' onkeyup="verificarCPF()" onkeydown="verificarCPF()" name="cpf" placeholder="Digite apenas os números do CPF">
                                        </div>
                                        
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <label for="rua" class="labels">Endereço</label>
                                            <input type="rua" class="form-control" name="endereco" value="" id="rua" placeholder="Ex: R. Rua dos Bobos">
                                        </div>
                                        <div class="col-md-1">
                                            <label for="numero" class="labels">N°</label>
                                            <input type="text" required name="numero" class="form-control" id="numero" placeholder="0">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="cep" id="label_cep" class="labels">CEP</label>
                                            <input type="cep" required class="form-control" id="cep" name="cep" onkeyup="verificarCEP()" onkeydown="verificarCEP()" placeholder="Ex: 19000-000">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="city" class="labels">Cidade</label>
                                            <input type="city" required class="form-control" id="cidade" name="cidade" placeholder="Ex: Presidente Prudente-SP">
                                        </div>
                                    </div>
                                    <div class="mt-5 text-center"><button class="btn btn-success profile-button" type="submit">Salvar!</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        @else
        <!-- ATUALIZAR PESSOA -->
            <div class="content">
                <div class="container-fluid rounded bg-white mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-3 border-right">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="/img/fotos_perfil/{{$pessoa->image}}"><span class="font-weight-bold">{{$pessoa->nome}}</span><span class="text-black-50">{{$pessoa->email}}</span><span> </span></div>
                        </div>
                        <div class="col-md-9 border-right"> 
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right"><kbd>Atualizar</kbd> - Dados Perfil Pessoa</h4>
                                </div>
                                <form action="{{route('pessoa.update','$pessoa->user_id')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row mt-2">
                                        <div class="form-group">
                                            <label for="image">Imagem de perfil: </label>
                                            <input type="file" class="form-control-file" id="image" name="image">
                                        </div>
                                        <div class="col-md-6">    
                                            <label class="labels">
                                                Nome Completo
                                            </label>
                                            <input type="text" required name="nome" value="{{$pessoa->nome}}" class="form-control" id="nome" placeholder="Nome">
                                        </div>
                                        <div class="col-md-3"><label for="est_civil" class="labels">Estado Civil</label>
                                            <select required class="form-select" name="estado_civil" aria-label="Default select example">
                                                <option selected value="{{$pessoa->estado_civil}}"></option>
                                                <option value="Solteiro">Solteiro</option>
                                                <option value="Casado">Casado</option>
                                                <option value="Viúvo">Viúvo</option>
                                                <option value="Divorciado">Divorciado</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3"> 
                                            <label for="nascimento" class="labels">Data de Nascimento</label>
                                            <input type="date" required name="data_nascimento" value="{{$pessoa->data_nascimento}}"  class="form-control" id="nascimento"></div>
                                        </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <label class="labels">Celular</label>
                                            <input type="tel" class="form-control" name="celular" value="{{$pessoa->celular}}" id="celular" placeholder="(00)00000-0000">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="email" class="labels">E-mail</label>
                                            <input type="mail" required class="form-control" value="{{$pessoa->email}}"  name="email" id="email" placeholder="teste@exemplo.com"></div>
                                        <div class="col-md-6">
                                            <label for="rg" class="form-label">RG</label>
                                            <input type="text" class="form-control" data-mask="000.00.000-0" value="{{$pessoa->rg}}"  name="rg" id="rg" placeholder="Ex: 000.000.000-00">
                                        </div>
                            
                                        <div class="col-md-6">
                                            <label for="cpf" name="exemplo" id="exemplo" class="form-label">CPF</label>
                                            <input type="text" required name="cpf" class="form-control" id="cpf" value="{{$pessoa->cpf}}"  maxlength='11' onkeyup="verificarCPF()" onkeydown="verificarCPF()" name="cpf" placeholder="Digite apenas os números do CPF">
                                        </div>
                                        
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <label for="rua" class="labels">Endereço</label>
                                            <input type="rua" class="form-control" name="endereco" value="{{$pessoa->endereco}}"  value="" id="rua" placeholder="Ex: R. Rua dos Bobos">
                                        </div>
                                        <div class="col-md-1">
                                            <label for="numero" class="labels">N°</label>
                                            <input type="text" required name="numero" value="{{$pessoa->numero}}" class="form-control" id="numero" placeholder="0">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="cep" id="label_cep" class="labels">CEP</label>
                                            <input type="cep" required class="form-control" id="cep" name="cep" value="{{$pessoa->cep}}"  onkeyup="verificarCEP()" onkeydown="verificarCEP()" placeholder="Ex: 19000-000">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="city" class="labels">Cidade</label>
                                            <input type="city" required class="form-control" id="cidade" value="{{$pessoa->cidade}}"  name="cidade" placeholder="Ex: Presidente Prudente-SP">
                                        </div>
                                    </div>
                                    <div class="mt-5 text-center"><button class="btn btn-success profile-button" type="submit">Salvar!</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        @endif
        
        <?php //var_dump($prestador) ?>
        @if(!isset($prestador))
            <div class="content">
                <div class="container-fluid rounded bg-white mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-3 border-right">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">Edogaru</span><span class="text-black-50">edogaru@mail.com.my</span><span> </span></div>
                        </div>
                        <div class="col-md-9 border-right">
                            <form action="{{route('prestador.store')}}" method="post" enctype="multipart/form-data">
                                @csrf 
                                <div class="p-3 py-5">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="text-right"><kbd>Cadastrar</kbd> - Dados Perfil Prestador</h4>
                                    </div>
                                    
                                    <div class="row mt-2">
                                        <label for="image">Imagem de perfil: </label>
                                        <input type="file" class="form-control-file" id="image" name="image">
                                    </div>
                                    <hr>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <label for="razao_social" class="labels">Razão Social</label>
                                            <input type="text" required name="razao_social" class="form-control razao_social" id="razao_social" placeholder="Exemplo LTDA">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="data_constituicao" class="labels">Data de Constituição</label>
                                            <input type="date" required name="data_constituicao" class="form-control data_constituicao" id="data_constituicao">
                                        </div>
                                        <div class="col-md-3"> 
                                            <label for="cnpj" class="labels">CNPJ</label>
                                            <input type="text" required class="form-control" name="cnpj" id="cnpj" maxlength='14' placeholder="XX.XXX.XXX/0001-XX">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-5">
                                            <label for="rua" class="form-label">Endereço</label>
                                            <input type="text" required class="form-control endereco" name="endereco" id="rua" placeholder="Ex: R. João Constatino Silva">
                                        </div>
                                        <div class="col-1">
                                            <label for="numero" class="form-label">N°</label>
                                            <input type="text" required name="numero" class="form-control numero" id="numero">
                                        </div>
                                        <div class="col-3">
                                            <label for="cidade" class="form-label">Cidade</label>
                                            <input type="city" required class="form-control cidade" id="cidade" name="cidade" placeholder="Ex: Presidente Prudente-SP">
                                        </div>
                                        <div class="col-3">
                                            <label for="cep" id="label_cep" class="form-label">CEP</label>
                                            <input type="cep" required class="form-control cep" id="cep" name="cep" onkeyup="verificarCEP()" onkeydown="verificarCEP()" placeholder="Ex: 19000-000">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <label for="celular" class="labels">Celular</label>
                                            <input type="tel" class="form-control celular" name="celular" id="celular" placeholder="(00)00000-0000">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="telefone" class="labels">Telefone</label>
                                            <input type="tel" class="form-control telefone" name="telefone" id="telefone" placeholder="(00)00000-0000">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="email" class="labels">E-mail</label>
                                            <input type="mail" required class="form-control" name="email" id="email" placeholder="teste@exemplo.com"></div>
                                        <div class="col-md-6">
                                            <label for="profissao" class="labels">Profissão</label>
                                            <input type="text" required class="form-control profissao" name="profissao" id="profissao" placeholder="Pedreiro">
                                        </div>
                            
                                        <div class="col-md-6">
                                            <label for="especialidade" class="labels">Especialidade</label>
                                            <input type="text" class="form-control especialidade" name="especialidade" id="especialidade" placeholder="Construção Civil">
                                        </div>
                                    </div>
                                    <!-- REDES SOCIAIS -->
                                    <hr>
                                    <h5><kbd>Redes Sociais</kbd></h5>
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <label for="website" class="labels">Website</label>
                                            <input type="text" class="form-control website" name="website" id="website">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="github" class="labels">Github</label>
                                            <input type="text" class="form-control telefone" name="github" id="github">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="twitter" class="labels">Twitter</label>
                                            <input type="text" class="form-control" name="twitter" id="twitter">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="instagram" class="labels">Instagram</label>
                                            <input type="text" class="form-control profissao" name="instagram" id="instagram">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="facebook" class="labels">Facebook</label>
                                            <input type="text" class="form-control especialidade" name="facebook" id="facebook">
                                        </div>
                                    </div>
                                    <hr>
                                    <h5><kbd>Soft Skill</kbd></h5>
                                    <div class="mt-3">
                                        <div class="inline">
                                            <label class="col-4" for="primeiroSoftskill" class="labels">1°</label>
                                            <label class="col-4" for="porcentagemPrimeiroSoftskill" class="labels">Porcentagem 1º Soft Skill</label>
                                            <input class="col-4" type="text" class="form-control website" placeholder="Ex: Criatividade" name="primeiroSoftskill" id="primeiroSoftskill">
                                            <input class="col-4 ml-4" type="number" max="100" min="0" class="form-control website" value="100" name="porcentagemPrimeiroSoftskill" id="porcentagemPrimeiroSoftskill">
                                        </div>
                                        <div class="inline">
                                            <label class="col-4" for="segundoSoftskill" class="labels">2°</label>
                                            <label class="col-4" for="porcentagemSegundoSoftskill" class="labels">Porcentagem 2º Soft Skill</label>
                                            <input class="col-4" type="text" class="form-control website" placeholder="Ex: Liderança" name="segundoSoftskill" id="segundoSoftskill">
                                            <input class="col-4 ml-4" type="number" max="100" min="0" class="form-control website" value="100" name="porcentagemSegundoSoftskill" id="porcentagemSegundoSoftskill">
                                        </div>
                                        <div class="inline">
                                            <label class="col-4" for="terceiroSoftskill" class="labels">3°</label>
                                            <label class="col-4" for="porcentagemTerceiroSoftskill" class="labels">Porcentagem 3º Soft Skill</label>
                                            <input class="col-4" type="text" class="form-control website" placeholder="Ex: Sociabilidade" name="terceiroSoftskill" id="terceiroSoftskill">
                                            <input class="col-4 ml-4" type="number" max="100" min="0" class="form-control website" value="100" name="porcentagemTerceiroSoftskill" id="porcentagemTerceiroSoftskill">
                                        </div>
                                        <div class="inline">
                                            <label class="col-4" for="quartoSoftskill" class="labels">4°</label>
                                            <label class="col-4" for="porcentagemQuartoSoftskill" class="labels">Porcentagem 4º Soft Skill</label>
                                            <input class="col-4" type="text" class="form-control website" placeholder="Ex: Trabalho em equipe" name="quartoSoftskill" id="quarto-softskill">
                                            <input class="col-4 ml-4" type="number" max="100" min="0" class="form-control website" value="100" name="porcentagemQuartoSoftskill" id="porcentagemQuartoSoftskill">
                                        </div>
                                        <div class="inline">
                                            <label class="col-4" for="quintoSoftskill" class="labels">5°</label>
                                            <label class="col-4" for="porcentagemQuintoSoftskill" class="labels">Porcentagem 5º Soft Skill</label>
                                            <input class="col-4" type="text" class="form-control website" placeholder="Ex: Comunicação" name="quintoSoftskill" id="quinto-softskill">
                                            <input class="col-4 ml-4" type="number" max="100" min="0" class="form-control website" value="100" name="porcentagemQuintoSoftskill" id="porcentagemQuintoSoftskill">
                                        </div>
                                    </div>
                                    <hr>
                                    <h5><kbd>Habilidades</kbd></h5>
                                    <div class="mt-3">
                                        <div class="inline">
                                            <label class="col-4" for="primeiroHabilidade" class="labels">1°</label>
                                            <label class="col-4" for="porcentagemPrimeiroHabilidade" class="labels">Porcentagem 1º Habilidade</label>
                                            <input class="col-4" type="text" class="form-control website" placeholder="Ex: HTML / CSS" name="primeiroHabilidade" id="primeiroHabilidade">
                                            <input class="col-4 ml-4" type="number" max="100" min="0" class="form-control website" value="100" name="porcentagemPrimeiroHabilidade" id="porcentagemPrimeiroHabilidade">
                                        </div>
                                        <div class="inline">
                                            <label class="col-4" for="segundoHabilidade" class="labels">2°</label>
                                            <label class="col-4" for="porcentagemSegundoHabilidade" class="labels">Porcentagem 2º Habilidade</label>
                                            <input class="col-4" type="text" class="form-control website" placeholder="Ex: HTML / CSS" name="segundoHabilidade" id="segundoHabilidade">
                                            <input class="col-4 ml-4" type="number" max="100" min="0" class="form-control website" value="100" name="porcentagemSegundoHabilidade" id="porcentagemSegundoHabilidade">
                                        </div>
                                        <div class="inline">
                                            <label class="col-4" for="terceiroHabilidade" class="labels">3°</label>
                                            <label class="col-4" for="porcentagemTerceiroHabilidade" class="labels">Porcentagem 3º Habilidade</label>
                                            <input class="col-4" type="text" class="form-control website" placeholder="Ex: HTML / CSS" name="terceiroHabilidade" id="terceiroHabilidade">
                                            <input class="col-4 ml-4" type="number" max="100" min="0" class="form-control website" value="100" name="porcentagemTerceiroHabilidade" id="porcentagemTerceiroHabilidade">
                                        </div>
                                        <div class="inline">
                                            <label class="col-4" for="quartoHabilidade" class="labels">4°</label>
                                            <label class="col-4" for="porcentagemQuartoHabilidade" class="labels">Porcentagem 4º Habilidade</label>
                                            <input class="col-4" type="text" class="form-control website" placeholder="Ex: HTML / CSS" name="quartoHabilidade" id="quartoHabilidade">
                                            <input class="col-4 ml-4" type="number" max="100" min="0" class="form-control website" value="100" name="porcentagemQuartoHabilidade" id="porcentagemQuartoHabilidade">
                                        </div>
                                        <div class="inline">
                                            <label class="col-4" for="quintoHabilidade" class="labels">5°</label>
                                            <label class="col-4" for="porcentagemQuintoHabilidade" class="labels">Porcentagem 5º Habilidade</label>
                                            <input class="col-4" type="text" class="form-control website" placeholder="Ex: HTML / CSS" name="quintoHabilidade" id="quintoHabilidade">
                                            <input class="col-4 ml-4" type="number" max="100" min="0" class="form-control website" value="100" name="porcentagemQuintoHabilidade" id="porcentagemQuintoHabilidade">
                                        </div>
                                    </div>
                                    <hr>
                                    <h5><kbd>Sobre Você</kbd></h5>
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <label for="informacao" class="labels">Informações</label>
                                            <textarea rows="2" type="text" class="form-control informacao" name="informacao" id="informacao"></textarea>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="sobre" class="labels">Sobre mim</label>
                                            <textarea rows="2" type="text" class="form-control sobre" name="sobre" id="sobre"></textarea>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="experiencia" class="labels">Experiência</label>
                                            <textarea rows="2" type="text" class="form-control experiencia" name="experiencia" id="experiencia"></textarea>
                                        </div>
                                    </div>
                                    <div class="mt-5 text-center"><button class="btn btn-success profile-button" type="submit">Salvar!</button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>  
            </div>
        @else
            <div class="content">
                <div class="container-fluid rounded bg-white mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-3 border-right">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="/img/fotos_perfil/{{$prestador->image}}"><span class="font-weight-bold">{{$prestador->razao_social}}</span><span class="text-black-50">{{$prestador->email}}</span><span> </span></div>
                        </div>
                        <div class="col-md-9 border-right">
                            <form action="{{route('prestador.update','$cadastro->user_id')}}" method="post" enctype="multipart/form-data">
                                @csrf 
                                @method('PATCH')
                                <div class="p-3 py-5">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="text-right"><kbd>Atualizar</kbd> - Dados Perfil Prestador</h4>
                                    </div>
                                    <div class="row mt-2">
                                        <label for="image">Imagem de perfil: </label>
                                        <input type="file" class="form-control-file" id="image" name="image">
                                    </div>
                                    <hr>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <label for="razao_social" class="labels">Razão Social</label>
                                            <input type="text" required value="{{$prestador->razao_social}}" name="razao_social" class="form-control razao_social" id="razao_social" placeholder="Exemplo LTDA">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="data_constituicao" class="labels">Data de Constituição</label>
                                            <input type="date" required name="data_constituicao"  value="{{$prestador->data_constituicao}}" class="form-control data_constituicao" id="data_constituicao">
                                        </div>
                                        <div class="col-md-3"> 
                                            <label for="cnpj" class="labels">CNPJ</label>
                                            <input type="text" required class="form-control" name="cnpj" value="{{$prestador->cnpj}}" id="cnpj" maxlength='14' placeholder="XX.XXX.XXX/0001-XX">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-5">
                                            <label for="rua" class="form-label">Endereço</label>
                                            <input type="text" required class="form-control endereco" value="{{$prestador->endereco}}" name="endereco" id="rua" placeholder="Ex: R. João Constatino Silva">
                                        </div>
                                        <div class="col-1">
                                            <label for="numero" class="form-label">N°</label>
                                            <input type="text" required name="numero" class="form-control numero" value="{{$prestador->numero}}" id="numero">
                                        </div>
                                        <div class="col-3">
                                            <label for="cidade" class="form-label">Cidade</label>
                                            <input type="city" required class="form-control cidade" value="{{$prestador->cidade}}" id="cidade" name="cidade" placeholder="Ex: Presidente Prudente-SP">
                                        </div>
                                        <div class="col-3">
                                            <label for="cep" id="label_cep" class="form-label">CEP</label>
                                            <input type="cep" required class="form-control cep" id="cep" value="{{$prestador->cep}}" name="cep" onkeyup="verificarCEP()" onkeydown="verificarCEP()" placeholder="Ex: 19000-000">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <label for="celular" class="labels">Celular</label>
                                            <input type="tel" class="form-control celular" name="celular" value="{{$prestador->celular}}" id="celular" placeholder="(00)00000-0000">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="telefone" class="labels">Telefone</label>
                                            <input type="tel" class="form-control telefone" name="telefone" value="{{$prestador->telefone}}" id="telefone" placeholder="(00)00000-0000">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="email" class="labels">E-mail</label>
                                            <input type="mail" required class="form-control" value="{{$prestador->email}}" name="email" id="email" placeholder="teste@exemplo.com"></div>
                                        <div class="col-md-6">
                                            <label for="profissao" class="labels">Profissão</label>
                                            <input type="text" required class="form-control profissao" value="{{$prestador->profissao}}" name="profissao" id="profissao" placeholder="Pedreiro">
                                        </div>
                            
                                        <div class="col-md-6">
                                            <label for="especialidade" class="labels">Especialidade</label>
                                            <input type="text" class="form-control especialidade" value="{{$prestador->especialidade}}" name="especialidade" id="especialidade" placeholder="Construção Civil">
                                        </div>
                                        
                                    </div>
                                    <!-- REDES SOCIAIS -->
                                    <hr>
                                    <h5><kbd>Redes Sociais</kbd></h5>
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <label for="website" class="labels">Website</label>
                                            <input type="text" class="form-control website" name="website" value="{{$prestador->website}}" id="website">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="github" class="labels">Github</label>
                                            <input type="text" class="form-control telefone" name="github" value="{{$prestador->github}}" id="github">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="twitter" class="labels">Twitter</label>
                                            <input type="text" class="form-control" name="twitter" value="{{$prestador->twitter}}" id="twitter">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="instagram" class="labels">Instagram</label>
                                            <input type="text" class="form-control profissao" name="instagram" value="{{$prestador->instagram}}" id="instagram">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="facebook" class="labels">Facebook</label>
                                            <input type="text" class="form-control especialidade" name="facebook" value="{{$prestador->facebook}}" id="facebook">
                                        </div>
                                    </div>
                                    <hr>

                                    <?php //var_dump($prestador) ?>
                                    <h5><kbd>Soft Skill</kbd></h5>
                                    <div class="mt-3">
                                        <div class="inline">
                                            <label class="col-4" for="primeiroSoftskill" class="labels">1°</label>
                                            <label class="col-4" for="porcentagemPrimeiroSoftskill" class="labels">Porcentagem 1º Soft Skill</label>
                                            <input class="col-4" type="text" value="{{$prestador->primeiroSoftskill}}" class="form-control website" name="primeiroSoftskill" id="primeiroSoftskill">
                                            <input class="col-4 ml-4" type="number" max="100" min="0" value="{{$prestador->porcentagemPrimeiroSoftskill}}" class="form-control website" name="porcentagemPrimeiroSoftskill" id="porcentagemPrimeiroSoftskill">
                                        </div>
                                        <div class="inline">
                                            <label class="col-4" for="segundoSoftskill" class="labels">2°</label>
                                            <label class="col-4" for="porcentagemSegundoSoftskill" class="labels">Porcentagem 2º Soft Skill</label>
                                            <input class="col-4" type="text" class="form-control website" value="{{$prestador->segundoSoftskill}}" name="segundoSoftskill" id="segundoSoftskill">
                                            <input class="col-4 ml-4" type="number" max="100" min="0" value="{{$prestador->porcentagemSegundoSoftskill}}" class="form-control website" name="porcentagemSegundoSoftskill" id="porcentagemSegundoSoftskill">
                                        </div>
                                        <div class="inline">
                                            <label class="col-4" for="terceiroSoftskill" class="labels">3°</label>
                                            <label class="col-4" for="porcentagemTerceiroSoftskill" class="labels">Porcentagem 3º Soft Skill</label>
                                            <input class="col-4" type="text" class="form-control website" value="{{$prestador->terceiroSoftskill}}" name="terceiroSoftskill" id="terceiroSoftskill">
                                            <input class="col-4 ml-4" type="number" max="100" min="0" class="form-control website" value="{{$prestador->porcentagemTerceiroSoftskill}}" name="porcentagemTerceiroSoftskill" id="porcentagemTerceiroSoftskill">
                                        </div>
                                        <div class="inline">
                                            <label class="col-4" for="quartoSoftskill" class="labels">4°</label>
                                            <label class="col-4" for="porcentagemQuartoSoftskill" class="labels">Porcentagem 4º Soft Skill</label>
                                            <input class="col-4" type="text" class="form-control website" value="{{$prestador->quartoSoftskill}}" name="quartoSoftskill" id="quarto-softskill">
                                            <input class="col-4 ml-4" type="number" max="100" min="0" class="form-control website" value="{{$prestador->porcentagemQuartoSoftskill}}" name="porcentagemQuartoSoftskill" id="porcentagemQuartoSoftskill">
                                        </div>
                                        <div class="inline">
                                            <label class="col-4" for="quintoSoftskill" class="labels">5°</label>
                                            <label class="col-4" for="porcentagemQuintoSoftskill" class="labels">Porcentagem 5º Soft Skill</label>
                                            <input class="col-4" type="text" class="form-control website" value="{{$prestador->quintoSoftskill}}" name="quintoSoftskill" id="quintoSoftskill">
                                            <input class="col-4 ml-4" type="number" max="100" min="0" class="form-control website" value="{{$prestador->porcentagemQuintoSoftskill}}" name="porcentagemQuintoSoftskill" id="porcentagemQuintoSoftskill">
                                        </div>
                                    </div>
                                    <hr>
                                    <h5><kbd>Habilidades</kbd></h5>
                                    <div class="mt-3">
                                        <div class="inline">
                                            <label class="col-4" for="primeiroHabilidade" class="labels">1°</label>
                                            <label class="col-4" for="porcentagemPrimeiroHabilidade" class="labels">Porcentagem 1º Habilidade</label>
                                            <input class="col-4" type="text" value="{{$prestador->primeiroHabilidade}}" class="form-control website" name="primeiroHabilidade" id="primeiroHabilidade">
                                            <input class="col-4 ml-4" type="number" max="100" min="0" class="form-control website" value="{{$prestador->porcentagemPrimeiroHabilidade}}" name="porcentagemPrimeiroHabilidade" id="porcentagemPrimeiroHabilidade">
                                        </div>
                                        <div class="inline">
                                            <label class="col-4" for="segundoHabilidade" class="labels">2°</label>
                                            <label class="col-4" for="porcentagemSegundoHabilidade" class="labels">Porcentagem 2º Habilidade</label>
                                            <input class="col-4" type="text" class="form-control website" value="{{$prestador->segundoHabilidade}}" name="segundoHabilidade" id="segundoHabilidade">
                                            <input class="col-4 ml-4" type="number" max="100" min="0" class="form-control website" value="{{$prestador->porcentagemSegundoHabilidade}}" name="porcentagemSegundoHabilidade" id="porcentagemSegundoHabilidade">
                                        </div>
                                        <div class="inline">
                                            <label class="col-4" for="terceiroHabilidade" class="labels">3°</label>
                                            <label class="col-4" for="porcentagemTerceiroHabilidade" class="labels">Porcentagem 3º Habilidade</label>
                                            <input class="col-4" type="text" class="form-control website"  value="{{$prestador->terceiroHabilidade}}" name="terceiroHabilidade" id="terceiroHabilidade">
                                            <input class="col-4 ml-4" type="number" max="100" min="0" class="form-control website" value="{{$prestador->porcentagemTerceiroHabilidade}}" name="porcentagemTerceiroHabilidade" id="porcentagem-terceiro-habilidade">
                                        </div>
                                        <div class="inline">
                                            <label class="col-4" for="quartoHabilidade" class="labels">4°</label>
                                            <label class="col-4" for="porcentagemQuartoHabilidade" class="labels">Porcentagem 4º Habilidade</label>
                                            <input class="col-4" type="text" class="form-control website" value="{{$prestador->quartoHabilidade}}" name="quartoHabilidade" id="quartoHabilidade">
                                            <input class="col-4 ml-4" type="number" max="100" min="0" class="form-control website"  value="{{$prestador->porcentagemQuartoHabilidade}}" name="porcentagemQuartoHabilidade" id="porcentagemQuartoHabilidade">
                                        </div>
                                        <div class="inline">
                                            <label class="col-4" for="quintoHabilidade" class="labels">5°</label>
                                            <label class="col-4" for="porcentagemQuintoHabilidade" class="labels">Porcentagem 5º Habilidade</label>
                                            <input class="col-4" type="text" class="form-control website" value="{{$prestador->quintoHabilidade}}" name="quintoHabilidade" id="quintoHabilidade">
                                            <input class="col-4 ml-4" type="number" max="100" min="0" class="form-control website" value="{{$prestador->porcentagemQuintoHabilidade}}" name="porcentagemQuintoHabilidade" id="porcentagemQuintoHabilidade">
                                        </div>
                                    </div>
                                    <hr>
                                    <h5><kbd>Sobre Você</kbd></h5>
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <label for="informacao" class="labels">Informações</label>
                                            <textarea rows="2" type="text" class="form-control informacao" name="informacao" id="informacao">{{$prestador->informacao}}</textarea>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="sobre" class="labels">Sobre mim</label>
                                            <textarea rows="2" type="text" class="form-control sobre" name="sobre" id="sobre">{{$prestador->sobre}}</textarea>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="experiencia" class="labels">Experiência</label>
                                            <textarea rows="2" type="text" class="form-control experiencia" name="experiencia" id="experiencia">{{$prestador->experiencia}}</textarea>
                                        </div>

                                    </div>
                                    <div class="mt-5 text-center"><button class="btn btn-success profile-button" type="submit">Salvar!</button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>  
            </div>
        @endif
    </div>
</x-app-layout>