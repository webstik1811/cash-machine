@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <div class="row d-flex justify-content-center align-items-center">
                            <a class="btn btn-primary w-50" href="{{ route('login.github') }}">
                                {{ __('Login with GitHub') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
