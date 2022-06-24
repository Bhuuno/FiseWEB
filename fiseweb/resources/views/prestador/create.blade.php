@extends('layouts.padrao')

@section('titulo', 'Contato')

@section('conteudo')
    <?php
        use App\Models\Pessoa;
        use App\Http\Controllers\PessoaController;
    ?>
    <div class="container mt-5">
        <h1>Cadastro Prestador</h1>
        <form action="{{route('pessoa.store')}}" method="post" class="row g-3 mt-4"}>
            @csrf
            <div class="row">
                <div class="col-md-5">
                    <label for="razao_social" class="form-label">Razão Social</label>
                    <input type="text" required name="razao_social" class="form-control razao_social" id="razao_social">
                </div>
                <div class="col-3">
                    <label for="data_constituicao" class="form-label">Data de Constituição</label>
                    <input type="date" required name="data_constituicao" class="form-control data_constituicao" id="data_constituicao">
                </div>
                <div class="col-md-4">
                    <label for="cnpj" class="form-label">CNPJ</label>
                    <input type="text" required class="form-control" name="cnpj" id="cnpj" placeholder="XX.XXX.XXX/0001-XX">
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
            <div class="row">
                <div class="col-4">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="mail" required class="form-control email" name="email" id="email">
                </div>
                <div class="col-3">
                    <label for="celular" class="form-label">Celular</label>
                    <input type="tel" class="form-control celular" name="celular" id="celular" placeholder="(00)00000-0000">
                </div>
                <div class="col-3">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="tel" class="form-control telefone" name="telefone" id="telefone" placeholder="(00)00000-0000">
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <label for="profissao" class="form-label">Profissão</label>
                    <input type="text" required class="form-control profissao" name="profissao" id="profissao" placeholder="Pedreiro">
                </div>
                <div class="col-4">
                    <label for="especialidade" class="form-label">Especialidade</label>
                    <input type="text" class="form-control especialidade" name="especialidade" id="especialidade" placeholder="Construção Civil">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label for="informacao" class="form-label">Informações</label>
                    <textarea rows="2" type="text" class="form-control informacao" name="informacao" id="informacao"></textarea>
                </div>
                <div class="col-12">
                    <label for="sobre" class="form-label">Sobre mim</label>
                    <textarea rows="2" type="text" class="form-control sobre" name="sobre" id="sobre"></textarea>
                </div>
                <div class="col-12">
                    <label for="experiencia" class="form-label">Experiência</label>
                    <textarea rows="2" type="text" class="form-control experiencia" name="experiencia" id="experiencia"></textarea>
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