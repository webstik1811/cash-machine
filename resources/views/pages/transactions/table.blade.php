@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <table class="table table-striped table-bordered table-hover"
                       id="transactions">
                    <thead>
                        <tr>
                            <th>{{ __('ID') }}</th>
                            <th>{{ __('Total') }}</th>
                            <th>{{ __('Inputs') }}</th>
                            <th>{{ __('Created At') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($transactions ?? [] as $transaction)
                        <tr>
                            <td>{{ $transaction->id }}</td>
                            <td> @money($transaction->amount) </td>
                            <td><pre><code>{{ json_encode($transaction->inputs, JSON_PRETTY_PRINT) }}</code></pre></td>
                            <td>{{ @date($transaction->created_at) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
