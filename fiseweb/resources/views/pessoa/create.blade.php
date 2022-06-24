@extends('layouts.padrao')

@section('titulo', 'Contato')

@section('conteudo')
    <?php
        use App\Models\Pessoa;
        use App\Http\Controllers\PessoaController;
    ?>
    <div class="container mt-5">
        <h1>Cadastro Cliente</h1>
        <form action="{{route('pessoa.store')}}" method="post" class="row g-3 mt-4"}>
            @csrf
            <div class="row">
                <div class="col-md-5">
                    <label for="nome" class="form-label">Nome Completo</label>
                    <input type="text" required name="nome" class="form-control" id="nome" placeholder="Nome">
                </div>

                <div class="col-3">
                    <label for="est_civil" class="form-label">Estado Civil</label>
                    <select required class="form-select" name="estado_civil" aria-label="Default select example">
                        <option selected value="Solteiro">Solteiro</option>
                        <option value="Casado">Casado</option>
                        <option value="Viúvo">Viúvo</option>
                        <option value="Divorciado">Divorciado</option>
                    </select>
                </div>
                    <div class="col-3">
                        <label for="nascimento" class="form-label">Data de Nascimento</label>
                        <input type="date" required name="data_nascimento" class="form-control" id="nascimento">
                    </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="rg" class="form-label">RG</label>
                    <input type="text" required class="form-control" name="rg" id="rg" placeholder="Ex: 000.000.000-00">
                </div>
                <div class="col-md-4">
                    <label for="cpf" name="exemplo" id="exemplo" class="form-label">CPF</label>
                    <input type="text" required name="cpf" class="form-control" id="cpf" maxlength='11' onkeyup="verificarCPF()" onkeydown="verificarCPF()" name="cpf" placeholder="Digite apenas os números do CPF">
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <label for="rua" class="form-label">Endereço</label>
                    <input type="rua" required class="form-control" name="endereco" id="rua" placeholder="Ex: R. João Constatino Silva">
                </div>
                <div class="col-1">
                    <label for="numero" class="form-label">N°</label>
                    <input type="text" required name="numero" class="form-control" id="numero">
                </div>
                <div class="col-3">
                    <label for="city" class="form-label">Cidade</label>
                    <input type="city" required class="form-control" id="cidade" name="cidade" placeholder="Ex: Presidente Prudente-SP">
                </div>
                <div class="col-3">
                    <label for="cep" id="label_cep" class="form-label">CEP</label>
                    <input type="cep" required class="form-control" id="cep" name="cep" onkeyup="verificarCEP()" onkeydown="verificarCEP()" placeholder="Ex: 19000-000">
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="mail" required class="form-control" name="email" id="email">
                </div>
                <div class="col-3">
                    <label for="telefone" class="form-label">Celular</label>
                    <input type="tel" class="form-control" name="celular" id="celular" placeholder="(00)00000-0000">
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