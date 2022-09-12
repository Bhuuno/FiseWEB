@extends('layouts.padrao')
@section('titulo', 'Pagamento')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pagamento') }}
        </h2>
                <!-- menu projeto -->
                @extends('layouts.menu')
    </x-slot>
    <div class="container-fluid">
        <div class="row flex-nowrap ">
            <div class="col-md-8 order-md-1">
                <form class="needs-validation" novalidate="">
                    <br>
                    <h4 class="mb-3">Pagamento</h4>

                    <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input id="credito" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
                        <label class="custom-control-label" for="credito">Cartão de crédito</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="debito" name="paymentMethod" type="radio" class="custom-control-input" required="">
                        <label class="custom-control-label" for="debito">Cartão de débito</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="">
                        <label class="custom-control-label" for="paypal">PayPal</label>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="cc-nome">Nome no cartão</label>
                        <input type="text" class="form-control" id="cc-nome" placeholder="" required="">
                        <small class="text-muted">Nome completo, como mostrado no cartão.</small>
                        <div class="invalid-feedback">
                        O nome que está no cartão é obrigatório.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cc-numero">Número do cartão de crédito</label>
                        <input type="text" class="form-control" id="cc-numero" placeholder="" required="">
                        <div class="invalid-feedback">
                        O número do cartão de crédito é obrigatório.
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="cc-expiracao">Data de expiração</label>
                        <input type="text" class="form-control" id="cc-expiracao" placeholder="" required="">
                        <div class="invalid-feedback">
                        Data de expiração é obrigatória.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="cc-cvv">CVV</label>
                        <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
                        <div class="invalid-feedback">
                        Código de segurança é obrigatório.
                        </div>
                    </div>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Continue o checkout</button>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>