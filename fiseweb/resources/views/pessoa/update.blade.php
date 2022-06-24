@extends('layouts.padrao')

@section('titulo', 'Contato')

@section('conteudo')
    <?php
        use App\Models\Pessoa;
        use App\Http\Controllers\PessoaController;
    ?>
    <div class="container mt-5">
        <h1>Alteração de Dados</h1>

        <form action="{{route('pessoa.update','$cadastro->user_id')}}" method="post" class="row g-3 mt-4"}>
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-md-5">
                    <label for="nome" class="form-label">Nome Completo</label>
                    <input type="text" required name="nome" class="form-control" id="nome" placeholder="Nome" value="{{$cadastro->nome}}">
                </div>

                <div class="col-3">
                    <label for="est_civil" class="form-label">Estado Civil</label>
                    <select class="form-select" required name="estado_civil" aria-label="Default select example">
                        <option selected value="{{$cadastro->estado_civil}}"></option>
                        <option value="Solteiro">Solteiro</option>
                        <option value="Casado">Casado</option>
                        <option value="Viúvo">Viúvo</option>
                        <option value="Divorciado">Divorciado</option>
                    </select>
                </div>
                    <div class="col-3">
                        <label for="nascimento" class="form-label">Data de Nascimento</label>
                        <input type="date" required name="data_nascimento" class="form-control" value="{{$cadastro->data_nascimento}}" id="nascimento">
                    </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="rg" class="form-label">RG</label>
                    <input type="text" required class="form-control" value="{{$cadastro->rg}}" name="rg" id="rg" placeholder="Ex: 000.000.000-00">
                </div>
                <div class="col-md-4">
                    <label for="cpf" name="exemplo" id="exemplo" class="form-label">CPF</label>
                    <input type="text" required name="cpf" value="{{$cadastro->cpf}}" class="form-control" id="cpf" maxlength='11' onkeyup="verificarCPF()" onkeydown="verificarCPF()" name="cpf" placeholder="Digite apenas os números do CPF">
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <label for="rua" class="form-label">Endereço</label>
                    <input type="rua" required class="form-control" value="{{$cadastro->endereco}}" name="endereco" id="rua" placeholder="Ex: R. João Constatino Silva">
                </div>
                <div class="col-1">
                    <label for="numero" class="form-label">N°</label>
                    <input type="text" required name="numero" value="{{$cadastro->numero}}" class="form-control" id="numero">
                </div>
                <div class="col-3">
                    <label for="city" class="form-label">Cidade</label>
                    <input type="city" required class="form-control" value="{{$cadastro->cidade}}" id="cidade" name="cidade" placeholder="Ex: Presidente Prudente-SP">
                </div>
                <div class="col-3">
                    <label for="cep" id="label_cep" class="form-label">CEP</label>
                    <input type="cep" required class="form-control" id="cep" value="{{$cadastro->cep}}" name="cep" onkeyup="verificarCEP()" onkeydown="verificarCEP()" placeholder="Ex: 19000-000">
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="mail" required class="form-control" value="{{$cadastro->email}}" name="email" id="email">
                </div>
                <div class="col-3">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="tel" class="form-control" value="{{$cadastro->telefone}}" name="telefone" id="telefone" placeholder="(00)00000-0000">
                </div>
            </div>
            <div class="mt-5 position-relative">
                <div class="position-absolute top-100 start-50 translate-middle">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </div>
        </form>
    </div>
@endsection