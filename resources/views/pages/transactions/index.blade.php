@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="mb-3">
                    @include('pages.transactions._partials.bank_transaction_form')
                </div>
                <div class="mb-3">
                    @include('pages.transactions._partials.cash_transaction_form')
                </div>
                <div class="mb-3">
                    @include('pages.transactions._partials.card_transaction_form')
                </div>
            </div>
        </div>
    </div>
@endsection
