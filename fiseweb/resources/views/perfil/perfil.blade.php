@extends('layouts.padrao')
    <link href="{{asset('css/perfil.css')}}" rel="stylesheet">
@section('titulo', 'Cadastro')

@section('conteudo')
<x-app-layout>
    <x-slot name="header">

        <button class="btn btn-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            <img src="/icons/list.svg" class="icon-space d-flex">  
          </button>        
          <h2 class="d-inline p-4">Perfil</h2>

    </x-slot>

    <div class="container-fluid">
        <div class="offcanvas offcanvas-start d-flex flex-column flex-shrink-0 p-3 bg-dark" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" style="width: 280px;">

            <a href="" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto  text-decoration-none text-white">
              <span class="fs-4">Menu</span>
            </a>
            <hr>
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
            <hr>    
        </div>
    <div class="tab container-fluid">
      <input type="radio" name="tabs" id="tab1" checked>
      <label for="tab1">Perfil Pessoal</label>

      <input type="radio" name="tabs" id="tab2">
      <label for="tab2">Perfil Prestador</label>


    <div class="tabs">
        <div class="content">
            <div class="container-fluid rounded bg-white mt-5 mb-5">
                <div class="row">
                    <div class="col-md-3 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">Edogaru</span><span class="text-black-50">edogaru@mail.com.my</span><span> </span></div>
                    </div>
                    <div class="col-md-9 border-right"> 
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Dados Perfil Pessoa</h4>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6"><label class="labels">Nome Completo</label><input type="text" class="form-control" placeholder="Nome completo" value=""></div>
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
                                <div class="col-md-6"><label class="labels">Celular</label><input type="text" class="form-control" placeholder="(xx)xxxxx-xxxx" value=""></div>

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
                            <div class="mt-5 text-center"><button class="btn btn-success profile-button" type="button">Salvar!</button></div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
        
        <div class="content">
            <div class="container-fluid rounded bg-white mt-5 mb-5">
                <div class="row">
                    <div class="col-md-3 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">Edogaru</span><span class="text-black-50">edogaru@mail.com.my</span><span> </span></div>
                    </div>
                    <div class="col-md-9 border-right"> 
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Dados Perfil Prestador</h4>
                            </div>
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
                            <div class="mt-5 text-center"><button class="btn btn-success profile-button" type="button">Salvar!</button></div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>

</x-app-layout>