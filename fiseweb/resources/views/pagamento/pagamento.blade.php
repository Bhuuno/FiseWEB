@extends('layouts.padrao')
@section('titulo', 'Pagamento')

<x-app-layout>
    <x-slot name="header">
        <button class="btn buttoncor" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            <img src="/icons/list.svg" class="img-button">  
        </button>         
        <h2 class="font-semibold text-xl text-gray-800 leading-tight d-inline p-3">
            PAGAMENTO
        </h2>
    </x-slot>
    <!-- menu projeto -->
    @extends('layouts.menu')

    <div class="container">
        <div class="row flex-nowrap ">
            <div class="col-md-12 order-md-1">
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
                    <div class="col-md-12 text-center mb-4">
                        <button class="btn btn-success btn-lg btn-block">Continue o checkout</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>