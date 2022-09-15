@extends('layouts.padrao')
    <link href="{{asset('css/perfil.css')}}" rel="stylesheet">
@section('titulo', 'Cadastro')

@section('conteudo')
<x-app-layout>
    <x-slot name="header">

        <button class="btn btn-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            <img src="/icons/list.svg" class="icon-space d-flex">  
          </button>        
          <h2 class="d-inline p-4">PERFIL</h2>

    </x-slot>

    <div class="container-fluid">
    <!-- menu projeto -->
    @extends('layouts.menu')

    @if(session('msg'))
        <div class="alert alert-success">
            <p style="text-align:center; align-items:center; font-size:20px;">{{session('msg')}}</p>
        </div>
    @endif
    <div class="tab container-fluid">
    <input type="radio" name="tabs" id="tab1" checked>
    <label for="tab1">Perfil Pessoal</label>

    <input type="radio" name="tabs" id="tab2">
    <label for="tab2">Perfil Prestador</label>
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
        @if(!isset($prestador))
            <div class="content">
                <div class="container-fluid rounded bg-white mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-3 border-right">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">Edogaru</span><span class="text-black-50">edogaru@mail.com.my</span><span> </span></div>
                        </div>
                        <div class="col-md-9 border-right">
                            <form action="{{route('prestador.store')}}" method="post">
                                @csrf 
                                <div class="p-3 py-5">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="text-right"><kbd>Cadastrar</kbd> - Dados Perfil Prestador</h4>
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
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">{{$prestador->razao_social}}</span><span class="text-black-50">{{$prestador->email}}</span><span> </span></div>
                        </div>
                        <div class="col-md-9 border-right">
                            <form action="{{route('prestador.update','$cadastro->user_id')}}" method="post">
                                @csrf 
                                @method('PATCH')
                                <div class="p-3 py-5">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="text-right"><kbd>Atualizar</kbd> - Dados Perfil Prestador</h4>
                                    </div>
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